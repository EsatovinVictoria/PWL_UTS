<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([                            
                    Wizard\Step::make('Data Barang')
                        ->icon('heroicon-o-cube')
                        ->description('Masukkan informasi barang.')
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextInput::make('barang_kode')
                                        ->label('Kode Barang')
                                        ->required()
                                        ->helperText('Kode barang harus unik.')
                                        ->unique(ignoreRecord: true)
                                        ->maxLength(10)
                                        ->placeholder('Masukkan kode barang')
                                        ->validationMessages([
                                            'unique' => 'Kode barang sudah digunakan. Harap gunakan kode lain.',
                                        ]),

                                    TextInput::make('barang_nama')
                                        ->label('Nama Barang')
                                        ->required()
                                        ->maxLength(100)
                                        ->placeholder('Masukkan nama barang'),

                                    Select::make('kategori_id')
                                        ->label('Kategori Barang')
                                        ->relationship('kategori', 'kategori_nama')
                                        ->searchable()
                                        ->preload()
                                        ->columnSpanFull()
                                        ->required(),
                                ])->columns(2),
                        ]),

                    Wizard\Step::make('Harga')
                        ->icon('heroicon-o-currency-dollar')
                        ->description('Masukkan harga barang.')
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextInput::make('harga_beli')
                                        ->label('Harga Beli')
                                        ->numeric()
                                        ->minValue(0)
                                        ->prefix('Rp')
                                        ->required(),

                                    TextInput::make('harga_jual')
                                        ->label('Harga Jual')
                                        ->numeric()
                                        ->minValue(0)
                                        ->prefix('Rp')
                                        ->required(),
                                ])->columns(2),
                        ]),
                ])
                ->columnSpanFull()
            ]);
    }
}