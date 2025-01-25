<?php

namespace App\Filament\Resources\SmsMessagesResource\Pages;

use App\Filament\Resources\SmsMessagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmsMessages extends EditRecord
{
    protected static string $resource = SmsMessagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
