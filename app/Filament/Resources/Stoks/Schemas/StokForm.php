<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Forms\Components\DateTimePicker;

class StokForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Wizard\Step::make('Informasi Stok')
                        ->icon('heroicon-o-cube')
                        ->description('Masukkan informasi stok barang.')
                        ->schema([
                            Section::make()
                                ->schema([
                                    Select::make('barang_id')
                                        ->label('Nama Barang')
                                        ->relationship('barang', 'barang_nama')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->helperText('Pilih barang yang akan diisi stok.'),

                                    Select::make('supplier_id')
                                        ->label('Supplier')
                                        ->relationship('supplier', 'supplier_nama')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->helperText('Pilih supplier barang.'),
                                ])->columns(2),
                        ]),

                    Wizard\Step::make('Detail Stok')
                        ->icon('heroicon-o-document-text')
                        ->description('Masukkan detail stok.')
                        ->schema([
                            Section::make()
                                ->schema([
                                    DateTimePicker::make('stok_tanggal')
                                        ->label('Tanggal Stok')
                                        ->required()
                                        ->default(now())
                                        ->timezone('Asia/Jakarta')
                                        ->displayFormat('d/m/Y')
                                        ->seconds(false)
                                        ->helperText('Tanggal transaksi stok.'),

                                    TextInput::make('stok_jumlah')
                                        ->label('Jumlah Stok')
                                        ->numeric()
                                        ->required()
                                        ->minValue(1)
                                        ->prefix('Qty')
                                        ->helperText('Jumlah barang yang masuk.')
                                        ->placeholder('Masukkan jumlah'),
                                ])->columns(2),
                        ]),
                ])
                ->columnSpanFull()
            ]);
    }
}