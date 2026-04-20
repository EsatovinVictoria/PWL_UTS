<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Supplier')
                    ->icon('heroicon-o-truck')
                    ->description('Masukkan informasi supplier dengan benar.')
                    ->schema([
                        TextInput::make('supplier_kode')
                            ->label('Kode Supplier')
                            ->prefixIcon('heroicon-o-hashtag')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true)
                            ->helperText('Kode supplier harus unik.')
                            ->placeholder('Masukkan kode supplier')
                            ->validationMessages([
                                'unique' => 'Kode supplier sudah digunakan. Harap gunakan kode lain.',
                            ]),
                        
                        TextInput::make('supplier_nama')
                            ->label('Nama Supplier')
                            ->prefixIcon('heroicon-o-building-storefront')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Masukkan nama supplier'),
                        
                        Textarea::make('supplier_alamat')
                            ->label('Alamat Supplier')
                            ->maxLength(255)
                            ->placeholder('Masukkan alamat lengkap supplier')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
            ])->columns(1);
    }
}