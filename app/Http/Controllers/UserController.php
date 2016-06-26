<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	/**
	 * Get all users.
     * @param  Illuminate\Http\Request $request
     * 
	 * @return [type] [description]
	 */
    public function getUsers(Request $request)
    {
        $paginate_amount = request()->input('paginate_amount') ?: $this->paginate_amount;

    	return User::with('role')->paginate($paginate_amount);
    }

    /**
     * Check if user name already exist.
     * 
     * @param  string $user_name
     * 
     * @return int
     */
    public function getUserName($user_name)
    {
        return (int) User::where('user_name', '=', $user_name)->exists();
    }

    /**
     * Create a new user.
     * 
     * @param  Illuminate\Http\Request $request
     * @param  App\User    $user
     * 
     * @return App\User
     */
    public function store(Request $request, User $user)
    {   	
    	return $user->createUser($request->all());
    }
}
