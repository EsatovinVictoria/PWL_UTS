<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class LevelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Level')
                    ->icon('heroicon-o-information-circle')
                    ->description('Detail lengkap data level.')
                    ->schema([
                        TextEntry::make('level_kode')
                            ->label('Kode Level')
                            ->icon('heroicon-o-hashtag')
                            ->badge()
                            ->color('primary'),
                        TextEntry::make('level_nama')
                            ->label('Nama Level')
                            ->icon('heroicon-o-tag')
                            ->badge()
                            ->color('success'),
                    ])->columnSpanFull(),
            ]);
    }
}
