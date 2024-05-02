<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Filament\Resources\VehicleResource\RelationManagers;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Table\Columns\TextColumn;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name'), // Assumi che 'name' sia il campo da visualizzare
            Forms\Components\TextInput::make('name'),
            Forms\Components\TextInput::make('year'),
            Forms\Components\TextInput::make('brand'),
            Forms\Components\TextInput::make('fuel'),
            Forms\Components\TextInput::make('km')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('user.name'),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('year'),
            Tables\Columns\TextColumn::make('brand'),
            Tables\Columns\TextColumn::make('fuel'),
            Tables\Columns\TextColumn::make('km')
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
            'interactWithChatGPT' => Pages\InteractWithChatGPT::route('/interact-with-chatgpt'),
        ];
    }

    public static function getNavigation(): array
    {
        return [
            'label' => static::$label,
            'icon' => static::$icon,
            'group' => __('Some Group'), // Opzionale
            'items' => [
                'index' => [
                    'label' => __('Manage Vehicles'),
                    'icon' => static::$icon,
                ],
                'interactWithChatGPT' => [
                    'label' => __('Interact with ChatGPT'),
                    'icon' => 'heroicon-o-chat-alt-2',
                ],
            ],
        ];
    }

    public static function getModel(): string
    {
        return Vehicle::class;
    }
}
