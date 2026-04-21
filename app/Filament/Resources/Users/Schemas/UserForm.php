<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;
use App\Filament\Resources\Users\Pages\CreateUser;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Wizard\Step::make('Informasi User')
                        ->icon('heroicon-o-information-circle')
                        ->description('Masukkan informasi user dengan benar.')
                        ->schema([
                            Section::make()
                                ->schema([
                                    Select::make('level_id')
                                        ->label('Level User')
                                        ->prefixIcon('heroicon-o-user-group')
                                        ->relationship('level', 'level_nama')
                                        ->searchable()
                                        ->preload()
                                        ->placeholder('Pilih level user')
                                        ->required(),

                                    TextInput::make('nama')
                                        ->label('Nama User')
                                        ->prefixIcon('heroicon-o-user')
                                        ->required()
                                        ->placeholder('Masukkan nama user')
                                        ->maxLength(100),

                                    TextInput::make('username')
                                        ->label('Username')
                                        ->prefixIcon('heroicon-o-at-symbol')
                                        ->required()
                                        ->maxLength(20)
                                        ->placeholder('Masukkan username')
                                        ->helperText('Username harus unik.')
                                        ->validationMessages([
                                            'unique' => 'Username sudah digunakan. Harap gunakan username lain.',
                                        ])
                                        ->unique(ignoreRecord: true),

                                    TextInput::make('email')
                                        ->label('Email')
                                        ->prefixIcon('heroicon-o-envelope')
                                        ->email()
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Masukkan email')
                                        ->helperText('Email harus unik.')
                                        ->unique(ignoreRecord: true)
                                        ->validationMessages([
                                            'unique' => 'Email sudah digunakan. Harap gunakan email lain.',
                                        ]),

                                ])
                                ->columns(2),
                        ]),

                    Wizard\Step::make('Password')
                        ->icon('heroicon-o-lock-closed')
                        ->description('Atur password user.')
                        ->schema([
                            Section::make()
                                ->schema([

                                    TextInput::make('password')
                                        ->label('Password')
                                        ->prefixIcon('heroicon-o-lock-closed')
                                        ->password()
                                        ->minLength(8)
                                        ->maxLength(255)
                                        ->helperText('Password minimal 8 karakter.')
                                        ->required()
                                        ->placeholder('Masukkan password'),

                                    TextInput::make('password_confirmation')
                                        ->label('Konfirmasi Password')
                                        ->prefixIcon('heroicon-o-lock-closed')
                                        ->password()
                                        ->same('password')
                                        ->minLength(8)
                                        ->maxLength(255)
                                        ->placeholder('Konfirmasi password')
                                        ->required()
                                ])
                                ->columns(1),
                        ]),

                ])
                ->columnSpanFull(),
            ]);
    }
}