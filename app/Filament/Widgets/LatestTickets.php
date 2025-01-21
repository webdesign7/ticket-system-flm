<?php

namespace App\Filament\Widgets;

use App\Models\Role;
use App\Models\Ticket;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestTickets extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                auth()->user()?->hasRole(Role::ROLES['admin']) ? Ticket::query() : Ticket::where('assigned_to', auth()->id())
            )
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn(Ticket $record) :?string => $record->description)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('priority')
                    ->colors([
                        'warning' => Ticket::PRIORITY['medium'],
                        'success' => Ticket::PRIORITY['low'],
                        'danger' => Ticket::PRIORITY['high'],
                    ])
                    ->badge(),
                Tables\Columns\TextColumn::make('assignedTo.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assignedBy.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ]);
    }
}
