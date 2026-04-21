<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Level')
                    ->icon('heroicon-o-information-circle')
                    ->description('Masukkan informasi level dengan benar.')
                    ->schema([
                        TextInput::make('level_kode')
                            ->label('Kode Level')
                            ->prefixIcon('heroicon-o-hashtag')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true)
                            ->helperText('Kode level harus unik.')
                            ->placeholder('Masukkan kode level')
                            ->validationMessages([
                                'unique' => 'Kode level sudah digunakan. Harap gunakan kode lain.',
                            ]),
                        TextInput::make('level_nama')
                            ->label('Nama Level')
                            ->prefixIcon('heroicon-o-tag')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Masukkan nama level'),    
                    ])->columnSpanFull(),
            ]);
    }
}
