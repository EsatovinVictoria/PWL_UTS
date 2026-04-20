<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Penjualan')
                    ->icon('heroicon-o-document-text')
                    ->description('Masukkan data penjualan.')
                    ->schema([
                        Select::make('user_id')
                            ->label('Penjual')
                            ->relationship('user', 'nama')
                            ->searchable()
                            ->placeholder('Pilih admin yang menangani penjualan')
                            ->preload()
                            ->required(),

                        TextInput::make('pembeli')
                            ->label('Pembeli'),

                        TextInput::make('penjualan_kode')
                            ->label('Kode Penjualan')
                            ->required()
                            ->helperText('Kode penjualan harus unik.')
                            ->unique(ignoreRecord: true)
                            ->maxLength(10)
                            ->placeholder('Masukkan kode penjualan')
                            ->validationMessages([
                                'unique' => 'Kode penjualan sudah digunakan. Harap gunakan kode lain.',
                            ]),

                        DatePicker::make('penjualan_tanggal')
                            ->label('Tanggal')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}