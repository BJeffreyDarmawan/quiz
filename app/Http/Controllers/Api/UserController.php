<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserModel $user){
        $this->user = $user;
    }

    // add new user
    public function register(Request $request){
        $user = new UserModel;
        $user =[
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password)
        ];

        try{
            $user = new UserModel($user);
            $user->save(); 
            return "Successfully Created";
        } catch(Exception $e){
            return $e;
        }

        return "Failed";
    }

    // show all users
    public function all(){
        $users = $this->user->all();

        return $users;
    }

    // show user by id
    public function find($id){
        $me = $this->user->with('items')->get();
        //$what = $this->getItems($id);
        //$me->item = $what;
        return $me;
    }

    // delete user
    public function deleteUser($id) {
        $userDel = $this->user->find($id);
        $userDel->delete();
        return 'Successfully removed';
    }

    // update user
    public function updateUser(Request $request, $id) {
        $user = $this->user->find($id);
        $user->id = $id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->save();
        echo 'Successfully updated';
    }

    public function getItems($id){
        //return redirect()->route("api/item/$id");
        //return redirect()->action('Api\ItemController@find', $id);
        // gimana sih manggil api dari controller.....

    }
}
