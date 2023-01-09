<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Pays;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaysResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaysResource\RelationManagers;
use App\Filament\Resources\PaysResource\RelationManagers\EmployesRelationManager;

class PaysResource extends Resource
{
    protected static ?string $model = Pays::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Paramètres';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                   TextInput::make('code_pays')->required(),
                   TextInput::make('Libelle')->minLength(2)->maxLength(255)->required(),
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('code_pays')->sortable()->searchable(),
                TextColumn::make('Libelle')->sortable()->searchable(),
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
            'index' => Pages\ListPays::route('/'),
            'create' => Pages\CreatePays::route('/create'),
            'edit' => Pages\EditPays::route('/{record}/edit'),
        ];
    }    
}
