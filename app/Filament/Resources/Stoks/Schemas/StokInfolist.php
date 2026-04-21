<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class StokInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Informasi Stok')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Section::make('Data Stok')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextEntry::make('barang.barang_nama')
                                                    ->label('Nama Barang')
                                                    ->icon('heroicon-o-cube')
                                                    ->badge()
                                                    ->color('success')
                                                    ->copyable(),

                                                TextEntry::make('supplier.supplier_nama')
                                                    ->label('Supplier')
                                                    ->icon('heroicon-o-truck')
                                                    ->badge()
                                                    ->color('warning'),

                                                TextEntry::make('stok_tanggal')
                                                    ->label('Tanggal & Waktu Stok')
                                                    ->icon('heroicon-o-calendar')
                                                    ->dateTime('d F Y H:i')
                                                    ->badge()
                                                    ->color('primary'),

                                                TextEntry::make('stok_jumlah')
                                                    ->label('Jumlah Stok')
                                                    ->icon('heroicon-o-cube')
                                                    ->badge()
                                                    ->color('danger'),

                                                TextEntry::make('user.nama')
                                                    ->label('Diinput Oleh')
                                                    ->icon('heroicon-o-user')
                                                    ->badge()
                                                    ->color('gray'),
                                            ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('Informasi Barang')
                            ->icon('heroicon-o-shopping-bag')
                            ->schema([
                                Section::make('Detail Barang')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextEntry::make('barang.barang_kode')
                                                    ->label('Kode Barang')
                                                    ->icon('heroicon-o-hashtag')
                                                    ->badge()
                                                    ->color('primary'),

                                                TextEntry::make('barang.harga_beli')
                                                    ->label('Harga Beli')
                                                    ->money('IDR')
                                                    ->badge()
                                                    ->color('warning'),

                                                TextEntry::make('barang.harga_jual')
                                                    ->label('Harga Jual')
                                                    ->money('IDR')
                                                    ->badge()
                                                    ->color('success'),
                                            ]),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}