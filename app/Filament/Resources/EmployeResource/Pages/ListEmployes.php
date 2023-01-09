<?php

namespace App\Filament\Resources\EmployeResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\EmployeResource;
use App\Filament\Resources\EmployeResource\Widgets\EmployeOverview;

class ListEmployes extends ListRecords
{
    protected static string $resource = EmployeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array{
        return [
            EmployeOverview::class,
        ];
    }
}
