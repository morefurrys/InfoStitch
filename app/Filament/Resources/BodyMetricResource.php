<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\BodyMetric;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BodyMetricResource\Pages;
use App\Filament\Resources\BodyMetricResource\RelationManagers;

class BodyMetricResource extends Resource
{
    protected static ?string $model = BodyMetric::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

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
                TextInput::make('bust'),
                TextInput::make('bust_cir'),
                TextInput::make('waist'),
                TextInput::make('hips'),
                TextInput::make('arm'),
                TextInput::make('arm_cir'),
                TextInput::make('biceps'),
                TextInput::make('biceps_cir'),
                TextInput::make('forearm'),
                TextInput::make('forearm_cir'),
                TextInput::make('shoulder'),
                TextInput::make('off_shoulder'),
                TextInput::make('dart'),
                TextInput::make('dart_cir'),
                TextInput::make('neck'),
                TextInput::make('mini_dress'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_id')->label('Customer ID'),
                TextColumn::make('bust')->label('Chest'),
                TextColumn::make('bust_cir')->label('Chest Cir'),
                TextColumn::make('waist')->label('Waist'),
                TextColumn::make('hips')->label('Hips'),
                TextColumn::make('arm')->label('Arm'),
                TextColumn::make('arm_cir')->label('Arm Cir'),
                TextColumn::make('biceps')->label('Biceps'),
                TextColumn::make('biceps_cir')->label('Biceps Cir'),
                TextColumn::make('forearm')->label('Forearm'),
                TextColumn::make('forearm_cir')->label('Forearm Cir'),
                TextColumn::make('shoulder')->label('Shoulder'),
                TextColumn::make('off_shoulder')->label('Off Shoulder'),
                TextColumn::make('dart')->label('Dart'),
                TextColumn::make('dart_cir')->label('Dart Cir'),
                TextColumn::make('neck')->label('Neck'),
                TextColumn::make('mini_dress')->label('Mini Dress'),
                TextColumn::make('created_at')->label('Created At'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBodyMetrics::route('/'),
            'create' => Pages\CreateBodyMetric::route('/create'),
            'edit' => Pages\EditBodyMetric::route('/{record}/edit'),
        ];
    }
}
