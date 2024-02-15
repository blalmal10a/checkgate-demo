<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleCheckResource\Pages;
use App\Filament\Resources\VehicleCheckResource\RelationManagers;
use App\Models\VehicleCheck;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Request;

class VehicleCheckResource extends Resource
{
    protected static ?string $model = VehicleCheck::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $selected_commodity_ids = [];
        return $form
            ->schema([
                DateTimePicker::make('date_and_time')->required(),
                TextInput::make('registration_no')->required(),
                TextInput::make('vehicle_type')->required(),
                Section::make('Entries')
                    ->schema([
                        Repeater::make('entries')
                            ->relationship('entries')
                            ->schema([
                                Select::make('commodity_id')
                                    ->relationship('commodity', 'name')
                                    ->placeholder('Select commodity'),
                                TextInput::make('no_of_bags')->required(),
                                TextInput::make('weight')->required(),
                            ])
                            ->columns(2),
                    ]),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('registration_no'),
                TextColumn::make('vehicle_type'),
                TextColumn::make('date_and_time'),
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
            'index' => Pages\ListVehicleChecks::route('/'),
            'create' => Pages\CreateVehicleCheck::route('/create'),
            'edit' => Pages\EditVehicleCheck::route('/{record}/edit'),
        ];
    }
}
