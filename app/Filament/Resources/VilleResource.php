<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ville;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VilleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VilleResource\RelationManagers;
use App\Filament\Resources\VilleResource\RelationManagers\EmployesRelationManager;

class VilleResource extends Resource
{
    protected static ?string $model = Ville::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';
     protected static ?string $navigationGroup = 'Paramètres';
     protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Card::make()
                ->schema([
                   Select::make('pays_id')
                            ->relationship('pays', 'Libelle')->preload()->required(),
                   TextInput::make('libelle')->minLength(2)->maxLength(255)->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('libelle')->sortable()->searchable(),
                TextColumn::make('pays.Libelle')->sortable()->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
             EmployesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVilles::route('/'),
            'create' => Pages\CreateVille::route('/create'),
            'edit' => Pages\EditVille::route('/{record}/edit'),
        ];
    }    
}
