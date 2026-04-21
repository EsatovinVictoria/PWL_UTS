<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Supplier;
use App\Models\Stok;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Barang', Barang::count())
                ->description('Jumlah produk yang terdaftar')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),
            Stat::make('Total Penjualan', Penjualan::count())
                ->description('Jumlah transaksi penjualan')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('success'),
            Stat::make('Total Supplier', Supplier::count())
                ->description('Jumlah supplier')
                ->descriptionIcon('heroicon-m-truck')
                ->color('warning'),
            Stat::make('Total Stok', Stok::sum('stok_jumlah'))
                ->description('Total item tersedia di gudang')
                ->descriptionIcon('heroicon-m-clipboard-document-check')
                ->color('info'),
        ];
    }
}
