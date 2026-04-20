<?php

namespace App\Filament\Resources\Penjualans\Pages;

use App\Filament\Resources\Penjualans\PenjualanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewPenjualan extends ViewRecord
{
    protected static string $resource = PenjualanResource::class;

    public function getTitle(): string
    {
        return 'View Penjualan ' . $this->record->penjualan_id;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Kembali')
                ->url(PenjualanResource::getUrl('index'))
                ->color('success'),

            EditAction::make(),
        ];
    }
}
