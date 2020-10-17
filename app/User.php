<?php
/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable,
        Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline() {
//        return Tweet::where('user_id', $this->id)->latest()->get();

        $friends = $this->follows->pluck('id');
//        $ids->push($this->id);

        return Tweet::whereIn('user_id', $friends)
                        ->orWhere('user_id', $this->id)
                        ->withLikes()
                        ->orderByDesc('id')
                        ->latest()->paginate(10);
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getRouteKeyName() {
        return 'name';
    }

    public function path($append = '') {

        $path = route('profile', $this->username);

        return $append ? "$path/{$append}" : "$path";
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value) {
        $path = !empty($value) ? 'public/storage/' . $value : 'public/img/default.jpg';
        return asset($path);
    }

}