<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleEntryResource\Pages;
use App\Filament\Resources\VehicleEntryResource\RelationManagers;
use App\Models\VehicleEntry;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('crossed_date_time')
                    ->format('Y-m-d h:i:s'),
                Forms\Components\TextInput::make('driver_name')
                    ->required()
                    ->maxLength(255),

                Repeater::make('commodity_details')
                    ->label('Commodity details')
                    ->relationship('commodity_details')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('commodity_id')
                            ->relationship('commodity', 'name')
                            ->distinct()
                            ->placeholder('Select commodity'),
                        Select::make('measurement_unit_id')
                            ->relationship('measurement_unit', 'abbreviation'),
                        TextInput::make('quantity')->numeric()->type('decimal'),

                        TextInput::make('origin_company')->required(),
                        TextInput::make('challan_no')->required(),
                        DatePicker::make('challan_date')->required(),
                        TextInput::make('agency_name')->required(),

                        Select::make('district_id')
                            ->relationship('district', 'name')
                            ->placeholder('Select district'),
                        // TextInput::make('no_of_bags')->required(),
                        TextInput::make('weight')
                            ->numeric()
                            ->hint('(if measurement is not weight)')
                            ->type('decimal'),
                    ])->columns(3)
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
