<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        /** @var User $user */
        $user = static::getModel()::create($data);

        if (isset($data['role_id'])) {
            $user->syncRoles(Role::query()->find($data['role_id']));
        }

        return $user;
    }
}
