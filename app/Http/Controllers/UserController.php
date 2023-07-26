<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
 
class UserController extends Controller
{
   
    public function create()
    {
        return view('register', [
            "title" => 'Register'
        ]);
    }

    public function store(Request $request){
      
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'username' =>['required', 'min:3', 'max:255', 'unique:users','alpha_dash'],
            'password' => 'min:6|required_with:password_confirm|same:password_confirm',
            'password_confirm' => 'min:6'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Success! Please Login');
    }
    public function edit(User $user){
        return view("edit", [
            "title" => "Edit",
            "user" => $user,
            "users" => User::limit(3)->get()
        ]);
    }
    public function update(Request $request, User $user)
    {
       
        
        if ($request->username == $user->username) {
            # code...
            $rules = [
                'name' => 'required|max:255',
                'username' => 'required|string|regex:/\w*$/|max:255'
            ];
        } else{
            
            $rules = [
                'name' => 'required|max:255',
                'username' => 'required|string|regex:/\w*$/|max:255|unique:users,username',
                  
            ];
        }
        
        $validatedData = $request->validate($rules);
        $validatedData["bio"] = $request->bio;
        $allowedfileExtension=['png','jpg','jpeg','JPG','JPEG','PNG','jfif'];
        if ($request->file("avatar")) {
            $check=in_array($request->file("avatar")->getClientOriginalExtension(),$allowedfileExtension);
            if(!$check) {
                return back()->with('error', 'Not an Image');
            } 
            $validatedData["avatar"] = $request->file("avatar")->store('avatar');
          
        }
       
      
      
        User::where('id', $user->id)->update($validatedData);
        return redirect("/profile/".$user->username)->with('success', 'Profile has been updated!');
    }
}

