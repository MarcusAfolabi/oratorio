<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules; 

    public function create(array $input): User
    {
        $username = strval(random_int(100000, 999999));
        Validator::make($input, [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'slug' => Str::slug($input['name'] . '-' . $input['last_name'] . '-' . $username, '-'),
            'username' => Str::slug($input['name'] . '-' . $input['last_name'] . '-' . $username, '-'),
        ]);
    }
}
         