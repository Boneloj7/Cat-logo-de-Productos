<?php

namespace App\Filament\Resources\ProfuctResource\Pages;

use App\Filament\Resources\ProfuctResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfuct extends CreateRecord
{
    protected static string $resource = ProfuctResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
