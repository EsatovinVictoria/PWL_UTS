<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class KategoriInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kategori_kode'),
                TextEntry::make('kategori_nama'),
            ]);
    }
}
