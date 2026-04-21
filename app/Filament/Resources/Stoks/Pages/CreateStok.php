<?php

namespace App\Filament\Resources\Stoks\Pages;

use App\Filament\Resources\Stoks\StokResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateStok extends CreateRecord
{
    protected static string $resource = StokResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id() ?? null; 
        return $data;
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $existing = \App\Models\Stok::where('barang_id', $data['barang_id'])->first();

        if ($existing) {
            $existing->stok_jumlah += $data['stok_jumlah'];
            $existing->supplier_id = $data['supplier_id'];
            $existing->stok_tanggal = now();
            $existing->user_id = $data['user_id'];

            $existing->save();

            return $existing;
        }

        return parent::handleRecordCreation($data);
    }
}
