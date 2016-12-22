<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Hash;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'phonenumber' => 0000,
                    'password' => Hash::make($providerUser->getEmail())
                ]); 

                $user->roles()->attach(3); //Set customer role to new User
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}