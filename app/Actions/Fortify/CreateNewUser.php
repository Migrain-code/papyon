<?php

namespace App\Actions\Fortify;

use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'start_time' => now()->toDateTimeString(),
            'end_time' => now()->addDays(30)->toDateTimeString(),
            'status' => 1
        ]);
        $place = new Place();
        $place->name = "1. Mekan";
        $place->slug = Str::slug("1. Mekan");
        $place->is_default = 1;
        $place->user_id = $user->id;
        $place->save();

        return $user;
    }
}
