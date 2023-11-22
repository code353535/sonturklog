<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->validate([
            'photo' => ['mimes:gif,png,jpg','max:2048'],

        ]);
    if($request->hasFile('photo')){

        if(Auth::user()->photo){
            $yol = (Auth::user()->photo);
            $photo_path = public_path('photo/'.$yol );
            if(file_exists($photo_path)){
                unlink($photo_path);
        }
    }

        $photo_name = time().'.'.$request->photo->Extension();
        $request->photo->move(public_path('photo'), $photo_name);
        $request->user()->photo = $photo_name;

    }
    $request->user()->save();
        return Redirect::route('profile.edit')->with('success', 'Profil bilgileriniz, başarı ile güncellendi.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
