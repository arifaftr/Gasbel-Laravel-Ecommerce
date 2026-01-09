<?php

$base = realpath(__DIR__ . '/..');
$sourcePublic = $base . '/storage/app/public';
$target = $base . '/public/storage';
$privateProducts = $base . '/storage/app/private/products';
$publicProducts = $base . '/storage/app/public/products';

function rr_copy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    while(false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            $srcPath = $src . '/' . $file;
            $dstPath = $dst . '/' . $file;
            if (is_dir($srcPath)) {
                rr_copy($srcPath, $dstPath);
            } else {
                copy($srcPath, $dstPath);
            }
        }
    }
    closedir($dir);
}

echo "Ensuring public storage is available...\n";

// If public/storage is already a symlink or directory with content, exit.
if (is_link($target)) {
    echo "{$target} is a symlink — nothing to do.\n";
    exit(0);
}

if (is_dir($target) && (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($target, RecursiveDirectoryIterator::SKIP_DOTS)))->valid()) {
    echo "{$target} already exists and appears populated — nothing to do.\n";
    exit(0);
}

// Try to create directory and copy public storage contents
if (!is_dir($target)) {
    @mkdir($target, 0777, true);
}

if (is_dir($sourcePublic)) {
    echo "Copying contents from {$sourcePublic} to {$target}...\n";
    rr_copy($sourcePublic, $target);
    echo "Copy complete.\n";
} else {
    echo "No files found at {$sourcePublic} to copy.\n";
}

// Move any existing product images from private to public storage if present
if (is_dir($privateProducts)) {
    echo "Checking for images in private products folder...\n";
    @mkdir($publicProducts, 0777, true);
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($privateProducts, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($it as $file) {
        $dest = $publicProducts . DIRECTORY_SEPARATOR . $file->getBasename();
        if ($file->isFile()) {
            if (!file_exists($dest)) {
                if (!@rename($file->getPathname(), $dest)) {
                    copy($file->getPathname(), $dest);
                    @unlink($file->getPathname());
                }
                echo "Moved: {$file->getBasename()}\n";
            }
        }
    }
    echo "Private -> public product migration complete.\n";
}

echo "Done. If you prefer a symlink and have permissions, run: php artisan storage:link\n";
