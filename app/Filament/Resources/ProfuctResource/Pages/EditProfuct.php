<?php

namespace App\Filament\Resources\ProfuctResource\Pages;

use App\Filament\Resources\ProfuctResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfuct extends EditRecord
{
    protected static string $resource = ProfuctResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
