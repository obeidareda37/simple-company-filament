<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Models\Employee;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All'        => Tab::make(),
            'This Week'  => $this->createTabWithScope('hiredThisWeek'),
            'This Month' => $this->createTabWithScope('hiredThisMonth'),
            'This Year'  => $this->createTabWithScope('hiredThisYear'),
        ];
    }
        protected function createTabWithScope(string $scopeMethod): Tab
    {
        $queryModifier = fn(Builder $query) => $query->$scopeMethod();
        $badgeCount = Employee::$scopeMethod()->count();

        return Tab::make()
            ->modifyQueryUsing($queryModifier)
            ->badge($badgeCount);
    }
}
