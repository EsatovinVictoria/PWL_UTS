<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PenjualanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Penjualan')
                    ->icon('heroicon-o-information-circle')
                    ->description('Detail lengkap data penjualan.')
                    ->schema([
                        Group::make([
                            TextEntry::make('user.nama')
                                ->label('Penjual')
                                ->icon('heroicon-o-user')
                                ->badge()
                                ->color('primary'),

                            TextEntry::make('pembeli')
                                ->label('Pembeli')
                                ->icon('heroicon-o-user-group')
                                ->badge()
                                ->color('warning'),
                        ]),

                        Group::make([
                            TextEntry::make('penjualan_kode')
                                ->label('Kode Penjualan')
                                ->icon('heroicon-o-hashtag')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('penjualan_tanggal')
                                ->label('Tanggal')
                                ->icon('heroicon-o-calendar')
                                ->date('d F Y')
                                ->badge()
                                ->color('gray'),
                        ]),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Detail Barang')
                    ->icon('heroicon-o-shopping-bag')
                    ->description('Daftar barang yang dibeli.')
                    ->schema([
                        RepeatableEntry::make('detail')
                            ->label('Details')
                            ->schema([
                                Grid::make(4)
                                    ->schema([
                                        TextEntry::make('barang.barang_nama')
                                            ->label('Nama Barang')
                                            ->icon('heroicon-o-cube')
                                            ->badge()
                                            ->color('success'),

                                        TextEntry::make('jumlah')
                                            ->label('Jumlah')
                                            ->badge()
                                            ->color('primary'),

                                        TextEntry::make('harga')
                                            ->label('Harga Satuan')
                                            ->money('IDR')
                                            ->badge()
                                            ->color('warning'),

                                        TextEntry::make('subtotal')
                                            ->label('Subtotal')
                                            ->money('IDR')
                                            ->badge()
                                            ->color('danger')
                                            ->state(fn ($record) => $record->harga * $record->jumlah),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnspanFull(),
            ]);
    }
}