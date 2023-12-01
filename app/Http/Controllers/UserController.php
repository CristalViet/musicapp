<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateAvatar(Request $request){
        $request->validate([
            'avatar'=>'image|mines:jpeg,png,jpg|max:2048',
        ]);
        
       
            
            
            $path=$request->file('avatar');
            $user=Auth::user();
            $user->avatarLink=$path;
            
            
            
            // $user->update([
            //     'avatarLink'=>$pathx
            // ]
               
            // );
            DB::table('users')
            ->where('id',$user['id'])
            ->update(['avatarLink'=> $user['avatarLink']]);
            return response()->json(['avatarLink'=>$path]);
    
        
    
        
        
        // return response()->json(['avatarLink'=>asset('avatars/'.basename($path))]);


    }
    public function update(Request $request){
        $formField=$request->validate([
            'name'=>'string',
            'email'=>'email',
            'gender'=>'integer',
            'avatarLink'=>'nullable|string'

        ]);
        $user=AUTH::user();
        DB::table('users')
            ->where('id',$user['id'])
            ->update(['name'=> $formField['name']]);
        
        return redirect(route('settingView'));
    }   
}
 