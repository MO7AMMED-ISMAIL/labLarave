<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{
    // Redirect to GitHub for authentication
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    // Handle callback from GitHub
    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        // Check if the user exists in your database or create a new one
        $user = User::firstOrCreate([
            'email' => $githubUser->getEmail(),
        ], [
            'name' => $githubUser->getName(),
            // Add any other required user data
        ]);

        // Log in the user
        Auth::login($user);

        // Redirect to home or any other desired page
        return redirect('/');
    }
}
