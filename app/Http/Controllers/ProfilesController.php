<?php
/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller {

    public function show(User $user) {
        $tweets = $user->tweets()->withLikes()->paginate(3);
        return view('profiles.show', compact('user', 'tweets'));
    }

    public function edit(User $user) {
//        abort_if($user->isNot(current_user()),404);
//        $this->authorize('edit',$user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $attribute = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user),],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user),],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
        ]);

        if (request('avatar')) {
            $attribute['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attribute);

        return redirect($user->path());
    }

}
