<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar'=>storage_path('app')."/$path"]);
        return redirect(route('profile.edit'))->with('message', 'Avatar updated successfully');
    }
}
