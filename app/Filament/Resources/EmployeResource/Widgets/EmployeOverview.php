<?php

namespace App\Filament\Resources\EmployeResource\Widgets;

use App\Models\Pays;
use App\Models\Employe;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $bf=Pays::where('Libelle','Burkina Faso')->withCount('employe')->first();
        $mi=Pays::where('Libelle','Mali')->withCount('employe')->first();
        return [
            Card::make('Nembre des Employés', Employe::all()->count().' Empoyés'),
            Card::make( 'Employés de '.$bf->Libelle, $bf->employe_count),
            Card::make( 'Employés du '.$mi->Libelle, $mi->employe_count),
        ];
    }
}
