<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class SupplierInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Supplier')
                    ->icon('heroicon-o-information-circle')
                    ->description('Detail lengkap data supplier.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextEntry::make('supplier_kode')
                                            ->label('Kode Supplier')
                                            ->icon('heroicon-o-hashtag')
                                            ->badge()
                                            ->color('primary'),

                                        TextEntry::make('supplier_nama')
                                            ->label('Nama Supplier')
                                            ->icon('heroicon-o-building-storefront')
                                            ->badge()
                                            ->color('success'),
                                    ]),

                                TextEntry::make('supplier_alamat')
                                    ->label('Alamat Supplier')
                                    ->icon('heroicon-o-map-pin')
                                    ->badge()
                                    ->color('gray')
                            ]),
                    ]),
            ])->columns(1);
    }
}