<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;


class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                ->icon('heroicon-o-information-circle')
                ->description('Masukkan informasi kategori dengan benar.')
                ->schema([
                    TextInput::make('kategori_kode')
                        ->label('Kode Kategori')
                        ->prefixIcon('heroicon-o-hashtag')
                        ->required()
                        ->maxLength(10)
                        ->unique(ignoreRecord: true)
                        ->helperText('Kode kategori harus unik.')
                        ->placeholder('Masukkan kode kategori')
                        ->validationMessages([
                            'unique' => 'Kode kategori sudah digunakan. Harap gunakan kode lain.',
                        ]),
                    TextInput::make('kategori_nama')
                        ->label('Nama Kategori')
                        ->prefixIcon('heroicon-o-tag')
                        ->required()
                        ->maxLength(100)
                        ->placeholder('Masukkan nama kategori'),    
                ])
            ])->columns(1);
    }
}
