<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use App\Models\Status;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StatusResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StatusResource\RelationManagers;

class StatusResource extends Resource
{
    protected static ?string $model = Status::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')
                ->relationship(
                    'customer',
                    'name'
                )
                ->searchable()
                ->preload(),
                
                DatePicker::make('due_date')
                ->timezone('Africa/Nairobi')
                ->minDate(now()),
                //->native(false)
                //->seconds(false)
                
                TextInput::make('balance')
                //->afterStateUpdated(fn ($state, callable $set) => $set('status_name', $state == 0 ? 'paid' : 'pending'))
                //->reactive()
                ->numeric()
                //->default(0)
                ->required(),

                // Select::make('status_name')
                // ->label('Status')
                // ->options([
                //     'pending' => 'Pending',
                //     'paid' => 'Paid'
                //     ])
                // ->native(false)
                // //->formatStateUsing(fn ($record) => $record->balance == 0 ? 'paid' : 'pending'),
                // ->default('pending')
                // ->disabled(),
                
                TextInput::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Customer.name')
                ->label('customer Name'),

                TextColumn::make('description')
                ->label('Description'),

                
                TextColumn::make('balance')
                ->label('Balance')
                //->numeric()
                ->money('KSH'),
                
                TextColumn::make('due_date')
                ->label('Due Date')
                ->date(),

                TextColumn::make('status_name')
                ->label('Status')
                ->badge()
                ->sortable()
                ->color(fn (string $state): string => [
                    'pending' => 'warning',
                    'paid' => 'success',
                ][$state] ?? 'secondary'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->button()
                ->outlined()
                ->size(ActionSize::ExtraSmall),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatuses::route('/'),
            'create' => Pages\CreateStatus::route('/create'),
            'edit' => Pages\EditStatus::route('/{record}/edit'),
        ];
    }
}
