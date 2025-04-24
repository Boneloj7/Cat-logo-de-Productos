<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfuctResource\Pages;
use App\Filament\Resources\ProfuctResource\RelationManagers;
use App\Models\Product;
use App\Models\Profuct;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class ProfuctResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema(components:[
            TextInput::make('name')
                ->label('Nombre')
                ->required()
                ->placeholder('Nombre del producto')
                ->maxLength(100),
            TextInput::make('description')
                ->label('Descripción')
                ->required()
                ->placeholder('Descripción del producto')
                ->maxLength(255),
            TextInput::make('price')
                ->label('Precio')
                ->required()
                ->placeholder('Precio del producto')
                ->prefix('$')
                ->numeric(),
            FileUpload::make('image')
                ->label('Imagen')
                ->required()
                ->placeholder('Imagen del producto')
                ->image()
                ->directory('products'),
            Select::make('category_id')
                ->label('Categoría del Producto')
                ->required()
                ->relationship('category', 'name')
                ->placeholder('Seleccione una categoría'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(components:[
        TextColumn::make(name: 'name')
        ->label(label: 'Nombre')
        ->searchable()
        ->sortable(),
        TextColumn::make(name: 'description')
        ->label(label: 'Descripción')
        ->searchable()
        ->sortable(),
        TextColumn::make(name: 'price')
        ->label(label: 'Precio')
        ->searchable()
        ->prefix(prefix: '$')
        ->formatStateUsing(callback: function(string $state): string {
            return number_format(num: $state, decimals: 2, decimal_separator: ',', thousands_separator: '.');
        })
        ->sortable(),
        TextColumn::make(name: 'category.name')
        ->label(label: 'Categoría')
        ->searchable()
        ->sortable(),
        ImageColumn::make(name: 'image')
        ->label(label: 'Imagen')
        ->sortable(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfucts::route('/'),
            'create' => Pages\CreateProfuct::route('/create'),
            'edit' => Pages\EditProfuct::route('/{record}/edit'),
        ];
    }
}
