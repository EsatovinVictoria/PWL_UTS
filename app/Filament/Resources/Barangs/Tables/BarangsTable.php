<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;

class BarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang_id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('barang_kode')
                    ->searchable()
                    ->sortable()
                    ->label('Kode Barang'),
                TextColumn::make('barang_nama')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Barang'),
                TextColumn::make('kategori.kategori_nama')
                    ->searchable()
                    ->sortable()
                    ->label('Kategori'),
                TextColumn::make('harga_jual')
                    ->searchable()
                    ->sortable()
                    ->label('Harga Jual'),
                TextColumn::make('harga_beli')
                    ->searchable()
                    ->sortable()
                    ->label('Harga Beli')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
