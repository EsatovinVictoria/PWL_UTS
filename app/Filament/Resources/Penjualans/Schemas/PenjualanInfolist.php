<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

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
                                ->color('warning'),

                            TextEntry::make('penjualan_tanggal')
                                ->label('Tanggal')
                                ->icon('heroicon-o-calendar')
                                ->badge()
                                ->color('gray'),
                        ]),
                    ])
                    ->columnSpanFull()
                    ->columns(2),
            ]);
    }
}