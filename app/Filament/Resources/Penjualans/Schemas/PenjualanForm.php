<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DateTimePicker;

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
                            ->label('Nama Pembeli')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('Masukkan nama pembeli'),

                        TextInput::make('penjualan_kode')
                            ->label('Kode Penjualan')
                            ->required()
                            ->helperText('Kode penjualan harus unik.')
                            ->unique(ignoreRecord: true)
                            ->maxLength(20)
                            ->placeholder('Masukkan kode penjualan')
                            ->validationMessages([
                                'unique' => 'Kode penjualan sudah digunakan. Harap gunakan kode lain.',
                            ]),

                        DateTimePicker::make('penjualan_tanggal')
                            ->label('Tanggal Penjualan')
                            ->required()
                            ->default(now())
                            ->timezone('Asia/Jakarta')
                            ->displayFormat('d/m/Y H:i:s')
                            ->seconds(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Detail Barang')
                    ->icon('heroicon-o-shopping-bag')
                    ->description('Masukkan barang yang dibeli oleh pembeli.')
                    ->schema([
                        Repeater::make('detail')
                            ->relationship()
                            ->label('')
                            ->schema([
                                Select::make('barang_id')
                                    ->label('Nama Barang')
                                    ->relationship('barang', 'barang_nama')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        // Ambil harga jual dari database
                                        $barang = \App\Models\Barang::find($state);
                                        if ($barang) {
                                            $set('harga', $barang->harga_jual);
                                        }
                                        // Hitung subtotal
                                        $jumlah = $get('jumlah');
                                        $harga = $get('harga');
                                        if ($jumlah && $harga) {
                                            $set('subtotal', $jumlah * $harga);
                                        }
                                    }),

                                TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->required()
                                    ->minValue(1)
                                    ->default(1)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $harga = $get('harga');
                                        if ($harga && $state) {
                                            $set('subtotal', $harga * $state);
                                        }
                                    }),

                                TextInput::make('harga')
                                    ->label('Harga Satuan')
                                    ->numeric()
                                    ->required()
                                    ->prefix('Rp')
                                    ->reactive()
                                    ->readonly()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $jumlah = $get('jumlah');
                                        if ($jumlah && $state) {
                                            $set('subtotal', $jumlah * $state);
                                        }
                                    }),

                                TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->disabled()
                                    ->dehydrated(false),
                            ])
                            ->columns(4)
                            ->cloneable()
                            ->addActionLabel('Tambah Barang')
                            ->required()
                            ->minItems(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}