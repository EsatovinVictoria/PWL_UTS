<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengguna')
                    ->icon('heroicon-o-information-circle')
                    ->description('Detail lengkap data pengguna.')
                    ->schema([
                        TextEntry::make('nama')
                            ->label('Nama Lengkap')
                            ->icon('heroicon-o-user')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('username')
                            ->label('Username')
                            ->icon('heroicon-o-at-symbol')
                            ->badge()
                            ->color('success'),
                    ])->columnSpanFull(),
            ]);
    }
}
