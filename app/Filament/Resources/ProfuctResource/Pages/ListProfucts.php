<?php

namespace App\Filament\Resources\ProfuctResource\Pages;

use App\Filament\Resources\ProfuctResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfucts extends ListRecords
{
    protected static string $resource = ProfuctResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
