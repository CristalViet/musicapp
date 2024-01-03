<?php

namespace App\Http\Controllers;

use App\Models\song;
use App\Models\User;

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
        
        return redirect(route('userSetting'));
    }   
    public function destroy($id){
     
        // $user=User::find($id);
        // $user->delete();
        return redirect()->route('admin.manageUsers');
    }
    public function editView($id){
        
        $user=User::find($id);
        // $user->delete();
   
        return view('admin.editUser',['user'=>$user]);
    }
    public function edit(Request $request,$id){

        if($request->password!=null){
      
            $formField=$request->validate([
                'name'=>'string',
                'email'=>'email',
                'gender'=>'integer',
                'password'=>'min:6',
                'avatarLink'=>'nullable|string'
    
            ]);
           $password=bcrypt($request->password) ;
           $formField['password']=$password;
           
        }
    
        else {
            $formField=$request->validate([
                'name'=>'string',
                'email'=>'email',
                'gender'=>'integer',
                
                'avatarLink'=>'nullable|string'
    
            ]);
        }
        
        
        $user=User::find($id);
        
        DB::table('users')
            ->where('id',$id)
            ->update($formField);
        
        return redirect(route('admin.manageUsers'));
    }   
    public function addFavouriteSong( Request $request,$id){
        
        $user=Auth()->user();
        $song=song::find($id);
        // Kiểm tra xem người dùng đã like bài hát chưa
        if (!DB::table('likes')->where('user_id', $user->id)->where('song_id', $id)->exists()) {
            // Nếu chưa like thì thêm dòng mới vào bảng likes
            DB::table('likes')->insert([
                'user_id' => $user->id,
                'song_id' => $song->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
        }
   
        else {
          
            $existingLike=DB::table('likes')->where('user_id', $user->id)->where('song_id', $id)->first();
  
            DB::table('likes')->where('id', $existingLike->id)->delete();
            return response()->json(['message'=>'Yêu thích']);
        }
        return response()->json(['message'=>'Hủy yêu thích']);
    }
}
 