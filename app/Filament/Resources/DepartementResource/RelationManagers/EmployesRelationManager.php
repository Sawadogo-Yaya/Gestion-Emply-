<?php

namespace App\Filament\Resources\DepartementResource\RelationManagers;

use Filament\Forms;
use App\Models\Pays;
use Filament\Tables;
use App\Models\Ville;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class EmployesRelationManager extends RelationManager
{
    protected static string $relationship = 'employe';

    protected static ?string $recordTitleAttribute = 'Nom';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                   TextInput::make('Nom')->minLength(2)->maxLength(255)->required(),
                   TextInput::make('Prenom')->minLength(2)->maxLength(255)->required(),
                   Select::make('pays_id')
                            ->label('Pays')
                            ->options(Pays::all()->pluck('Libelle','id')->toArray())
                            ->reactive(),
                   Select::make('ville_id')
                            ->label('Ville')
                            ->options(function (callable $get){
                                $pays=Pays::find($get('pays_id'));
                                if(!$pays){
                                    return Ville::all()->pluck('libelle','id');
                                }
                                return $pays->ville->pluck('libelle','id');
                            })->preload(),
                   Select::make('departement_id')
                            ->relationship('departement', 'libelle')->preload()->required(),
                   TextInput::make('adresse'),
                   TextInput::make('zip_code'),
                   DatePicker::make('date_naissance')->required(),
                   DatePicker::make('date_emboche')->required()
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('Nom')->sortable()->searchable(),
                TextColumn::make('Prenom')->sortable()->searchable(),
                TextColumn::make('pays.Libelle')->sortable()->searchable(),
                TextColumn::make('ville.libelle')->sortable()->searchable(),
                TextColumn::make('departement.libelle')->sortable()->searchable(),
                TextColumn::make('adresse')->sortable()->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y')->sortable(),
                TextColumn::make('date_naissance')
                    ->dateTime('d-M-Y')->sortable(),
                TextColumn::make('date_emboche')
                    ->dateTime('d-M-Y')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
