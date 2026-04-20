<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kategori_kode')
                    ->required(),
                TextInput::make('kategori_nama')
                    ->required(),
            ]);
    }
}
