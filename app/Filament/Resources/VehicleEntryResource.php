<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleEntryResource\Pages;
use App\Filament\Resources\VehicleEntryResource\RelationManagers;
use App\Models\VehicleEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehicleEntryResource extends Resource
{
    protected static ?string $model = VehicleEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('registration_no')
                    ->required()
                    ->maxLength(255)
                    ->default('N/A'),
                Forms\Components\DateTimePicker::make('crossed_date_time'),
                Forms\Components\TextInput::make('driver_name')
                    ->required()
                    ->maxLength(255)
                    ->default('N/A'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('crossed_date_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('driver_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVehicleEntries::route('/'),
            'create' => Pages\CreateVehicleEntry::route('/create'),
            'view' => Pages\ViewVehicleEntry::route('/{record}'),
            'edit' => Pages\EditVehicleEntry::route('/{record}/edit'),
        ];
    }
}
