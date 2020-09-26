<?php

namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Session\Session;
// use Illuminate\Support\Facades\Session;

class UserGroupController extends Controller
{
    public function index(){
        $Group = Group::all();
        return view('group.group',compact('Group'));
    }

    public function Create(){
        return view('group.create');
    }

    public function Store(Request $request){
       $Store = Group::insert([
           'title' => $request->title,
           'created_at' => Carbon::now()
       ]);
       return view('group.create', compact('Store'))->with('message', 'Groups Inserted Successfully');
    }

    public function Edit($id){
        $edit = Group::findOrFail($id);
        return view('group.edit', compact('edit'));
    }

    public function Update(Request $request){
        $id = $request->id;
        $update = Group::findOrFail($id)->update([
            'title' => $request->title,
            'created_at' => Carbon::now()
        ]);
         return Redirect('/group')->with('message', 'Groups Updated Successfully');
    }


    public function Delete($id){
        $delete = Group::find($id)->delete();
        return Redirect('/group')->with('message', 'Groups Deleted Successfully');
    }
}
