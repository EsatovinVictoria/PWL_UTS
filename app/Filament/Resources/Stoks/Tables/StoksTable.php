<?php

namespace App\Filament\Resources\Stoks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StoksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('stok_id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('barang.barang_nama')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Barang'),

                TextColumn::make('supplier.supplier_nama')
                    ->searchable()
                    ->sortable()
                    ->label('Supplier'),

                TextColumn::make('stok_tanggal')
                    ->searchable()
                    ->sortable()
                    ->date('d M Y H:i')
                    ->label('Tanggal Stok'),

                TextColumn::make('stok_jumlah')
                    ->searchable()
                    ->sortable()
                    ->label('Jumlah'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('stok_tanggal', 'desc')
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