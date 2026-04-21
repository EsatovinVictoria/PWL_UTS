<?php

namespace App\Filament\Resources\Stoks\Pages;

use App\Filament\Resources\Stoks\StokResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewStok extends ViewRecord
{
    protected static string $resource = StokResource::class;

    public function getTitle(): string
    {
        return 'View Stok ' . $this->record->stok_id . ' - ' . $this->record->barang->barang_nama;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Kembali') 
                ->url(StokResource::getUrl('index'))
                ->color('success'),

            EditAction::make(),
        ];
    }
}
