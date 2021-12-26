<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class GroupController extends Controller
{
    public function addGroup(){
        $groups = [
            ['name'=>'CARE'],
            ['name'=>'London'],
            ['name'=>'LWC'],
        ];

        Group::insert($groups);

        return "Groups are created";
    }

    public function addUser()
    {
        $user = new User();
        $user->name="john";
        $user->email = 'jennjohnifer@email.com';
        $user->password = Hash::make('secret');
        $user->save();

        // adding group ids into FK
        $groupids = [1,2]; // from groups table
        $user->groups()->attach($groupids); // attaching the ids in Many to many relationship

        return "Record has been created";
    }


   public function getAllRolesByUser($id)
   {
       $user = User::find($id);
       return $user->groups;
   } 

   public function getAllUsersByRoles($groupid)
   {
       $group = Group::find($groupid);
       return $group->users;
   }
}
