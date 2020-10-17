<?php
/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\User;

class Tweet extends Model {

    use Likable;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
