<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk')->required(),

                Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->required(),

                TextInput::make('stok')->numeric()->required(),

                TextInput::make('harga')->numeric()->required(),

                FileUpload::make('gambar')
                    ->directory('produk-images')
                    ->disk('public')
                    ->image()
                    ->preserveFilenames()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public'),

                TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->searchable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori'),

                TextColumn::make('stok')
                    ->label('Stok'),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR', true),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
