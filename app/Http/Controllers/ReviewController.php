<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\Review;
use App\Models\Reviewer;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $businessId)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string',
        ]);

        $reviewer = Reviewer::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name
        ]);

        Review::create([
            'reviewer_id' => $reviewer->id,
            'business_id' => $businessId,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review added successfully');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->findOrCreateReviewer($user, 'facebook');
        return redirect()->route('home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->findOrCreateReviewer($user, 'google');
        return redirect()->route('home');
    }

    private function findOrCreateReviewer($socialUser, $provider)
    {
        $reviewer = Reviewer::where('provider_id', $socialUser->getId())->first();

        if (!$reviewer) {
            $reviewer = Reviewer::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ]);
        }

        session(['reviewer_id' => $reviewer->id]);
    }
}
