<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */
trait Followable {

    public function follow(User $user) {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user) {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user) {
        //        if ($this->following($user)) {
//            return $this->unfollow($user);
//        }
//        return $this->follow($user);
//        short code
        $this->follows()->toggle($user);
    }

    public function following(User $user) {
        return $this->follows()
                        ->where('following_user_id', $user->id)
                        ->exists();
    }

    public function follows() {
        return $this->belongsToMany(
                        User::class, 'follows', 'user_id', 'following_user_id'
        );
    }

}
