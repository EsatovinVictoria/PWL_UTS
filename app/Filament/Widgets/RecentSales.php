<?php

namespace App\Filament\Widgets;

use App\Models\Penjualan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentSales extends TableWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Penjualan::query()->latest('penjualan_tanggal')->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('penjualan_kode')
                    ->label('Kode Penjualan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pembeli')
                    ->label('Pembeli')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penjualan_tanggal')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.username')
                    ->label('Kasir'),
            ]);
    }
}
