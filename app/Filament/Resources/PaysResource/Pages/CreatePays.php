<?php

namespace App\Filament\Resources\PaysResource\Pages;

use App\Filament\Resources\PaysResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePays extends CreateRecord
{
    protected static string $resource = PaysResource::class;
     protected function getRedirectUrl(): string {
            return $this->getResource()::getUrl('index');
        }
}
