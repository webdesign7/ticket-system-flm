<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\Ticket;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables;
use Livewire\Component;
use Filament\Tables\Contracts\HasTable;

class ListTickets extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Ticket::query())
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn(Ticket $record) :?string => $record->description)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options(Ticket::STATUS),
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

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(Ticket::STATUS)
                    ->label('Status'),
                Tables\Filters\SelectFilter::make('priority')
                    ->options(Ticket::PRIORITY)
                    ->label('Priority'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function render()
    {
        return view('livewire.list-tickets');
    }
}
