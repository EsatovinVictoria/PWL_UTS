<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Grid;

class BarangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Barang')
                    ->icon('heroicon-o-information-circle')
                    ->description('Detail lengkap data barang.')
                    ->schema([
                        Group::make([
                            TextEntry::make('barang_kode')
                                ->label('Kode Barang')
                                ->icon('heroicon-o-hashtag')
                                ->badge()
                                ->color('primary'),
                            TextEntry::make('barang_nama')
                                ->label('Nama Barang')
                                ->icon('heroicon-o-cube')
                                ->badge()
                                ->color('success'),
                            TextEntry::make('kategori.kategori_nama')
                                ->label('Kategori Barang')
                                ->icon('heroicon-o-tag')
                                ->badge()
                                ->color('warning'),
                        ]),

                        Group::make([
                            TextEntry::make('harga_beli')
                                ->label('Harga Beli')
                                ->icon('heroicon-o-currency-dollar')
                                ->badge()
                                ->color('danger'),
                            TextEntry::make('harga_jual')
                                ->label('Harga Jual')
                                ->icon('heroicon-o-currency-dollar')
                                ->badge()
                                ->color('success'),
                        ]),
                    ])->columns(2),
            ])->columns(1);
    }
}
