<?php

namespace App\Filament\Resources\Stoks;

use App\Filament\Resources\Stoks\Pages\CreateStok;
use App\Filament\Resources\Stoks\Pages\EditStok;
use App\Filament\Resources\Stoks\Pages\ListStoks;
use App\Filament\Resources\Stoks\Pages\ViewStok;
use App\Filament\Resources\Stoks\Schemas\StokForm;
use App\Filament\Resources\Stoks\Schemas\StokInfolist;
use App\Filament\Resources\Stoks\Tables\StoksTable;
use App\Models\Stok;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'stok_id';

    protected static ?string $navigationLabel = 'Stok';

    protected static ?string $pluralLabel = 'Stok';

    protected static ?string $slug = 'stok';

    public static function form(Schema $schema): Schema
    {
        return StokForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StokInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StoksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStoks::route('/'),
            'create' => CreateStok::route('/create'),
            'view' => ViewStok::route('/{record}'),
            'edit' => EditStok::route('/{record}/edit'),
        ];
    }

    public static function getPluralLabel(): ?string
    {
        return 'Stok';
    }
}
