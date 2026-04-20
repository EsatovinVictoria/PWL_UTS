<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KategoriInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->icon('heroicon-o-information-circle')
                    ->description('Detail lengkap data kategori.')
                    ->schema([
                        TextEntry::make('kategori_kode')
                            ->label('Kode Kategori')
                            ->icon('heroicon-o-hashtag')
                            ->badge()
                            ->color('primary'),
                        TextEntry::make('kategori_nama')
                            ->label('Nama Kategori')
                            ->icon('heroicon-o-tag')
                            ->badge()
                            ->color('success'),
                    ])->columnSpanFull(),
            ]);
    }
}