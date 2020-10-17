<?php
/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{
    public function __invoke(){
        $users=User::paginate(50);
        
        return view('explore',compact('users'));
    }
}
