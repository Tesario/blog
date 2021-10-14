<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\Profile;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use View;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit']]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $profile = $user->profile;

        return view('profile.show', ['user' => $user, 'profile' => $profile]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $profile = $user->profile;
        $this->authorize("edit-profile", $profile);

        return view('profile.edit', ['user' => $user, 'profile' => $profile]);
    }

    public function update(EditProfileRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $this->authorize("edit-profile", $profile);

        if ($request->image) {
            Storage::disk('public')->delete($profile->image);
            $request->image->store('uploads', 'public');
            $imagePath = $request->image->store('uploads', 'public');
        } else {
            $imagePath = $profile->image;
        }

        $profile->update(
            [
                'image' => $imagePath,
                'gendar' => $request['gendar'],
                'birthdate' => $request['birthdate'],
                'school' => $request['school'],
                'address' => $request['address']
            ]
        );

        $user = $profile->user;
        $user->update($request->only('name'));

        return redirect('user/' . $profile->user_id . '/profile');
    }
}
