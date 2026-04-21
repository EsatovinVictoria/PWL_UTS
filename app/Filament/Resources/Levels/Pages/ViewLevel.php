<?php

namespace App\Filament\Resources\Levels\Pages;

use App\Filament\Resources\Levels\LevelResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewLevel extends ViewRecord
{
    protected static string $resource = LevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Kembali')
                ->url(LevelResource::getUrl('index'))
                ->color('success'),

            EditAction::make(),
        ];
    }
}
