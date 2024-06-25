<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use Filament\Notifications\Notification;
use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

//    protected function getCreatedNotificationTitle(): ?string
//    {
//        return 'Employee created';
//    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Employee created')
            ->body('The Employee created successfully.');
    }
}