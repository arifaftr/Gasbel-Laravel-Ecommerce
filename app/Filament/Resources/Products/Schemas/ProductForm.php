<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use App\Models\Category;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(255),

                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->maxLength(65535),

                FileUpload::make('image')
                    ->label('Product Image')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imagePreviewHeight('250')
                    ->deletable(true)
                    ->downloadable(true)
                    ->columnSpanFull(),

                 
            ]);
    }
}
