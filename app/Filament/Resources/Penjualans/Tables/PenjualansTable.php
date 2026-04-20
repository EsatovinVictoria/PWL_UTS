<?php

namespace App\Filament\Resources\Penjualans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;

class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penjualan_id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.nama')
                    ->searchable()
                    ->sortable()
                    ->label('Penjual'),
                TextColumn::make('penjualan_kode')
                    ->searchable()
                    ->sortable()
                    ->label('Kode Penjualan'),
                TextColumn::make('penjualan_tanggal')
                    ->label('Tanggal Penjualan')
                    ->dateTime()
                    ->searchable()
                    ->sortable()
                    ->label('Tanggal Penjualan'),
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
