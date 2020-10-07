<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function insert (Request $request)
    {
        $user = new User();
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->firstRefer = $request->get('firstRefer');
        $user->secondRefer = $request->get('secondRefer');

        $user->save();
        
        return back();
    }

    public function referInsert (Request $request)
    {
        $email = $request->input('email');
        if (User::where('firstRefer', '=', $email)->count() > 0)
        {
            $user = new User();
        
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            
            $user->save();
        } 

        else if (User::where('secondRefer', '=', $email)->count() > 0)
        {
            $user = new User();
        
            $user->name = $request->get('name');
            $user->email = $request->get('email');

            $user->save();            
        } 

        else {
            Session::flash('message', 'Este e-mail não foi indicado');
            return back();
        }
  
        if($user->id > 2) {
            $user->rating='100';
        } else {
            $user->rating='200';
        }

        $user->save();
        
        return back();
    }

    public function delete($post_id)
    {
         $post_id = decrypt($post_id);
         $post = Post::find($post_id);

         $post->delete();
         return back();
    }

    public function show ()
    {
        $users = User::all();
        $countUsers = count($users);

        return view('welcome', compact(
            'users',
            'countUsers'
        ));
    }

    public function restart ()
    {
        Artisan::call("migrate:fresh", ["--force" => true]);

        return back();
    }

}
