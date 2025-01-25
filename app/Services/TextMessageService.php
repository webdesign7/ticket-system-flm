<?php

namespace App\Services;

use App\Models\TextMessage;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TextMessageService
{
    public static function sendBulkSms(array $data, Collection $records): void
    {
        $textMessages = collect([]);

        $records->map(function ($record) use ($data, $textMessages) {
            $textMessage = self::sendTextMessage($record, $data);
            $textMessages->push($textMessage);
        });

        TextMessage::insert($textMessages->toArray());
    }

    private static function sendTextMessage(User $record, array $data): array
    {
        $message = Str::replace(
            '{name}', $record->name, $data['message']
        );

        return [
            'message' => $message,
            'sent_by' => auth()->user()->id ?? null,
            'status' => TextMessage::STATUS['PENDING'],
            'response' => null,
            'sent_to' => $record->id,
            'remarks' => $data['remarks'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
