<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupController extends Controller
{
    public function index()
    {
        $this->data['groups'] = UserGroup::all();
        return view('group.group', $this->data);
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        $fromData = $request->all();
        if( UserGroup::create($fromData)){
            Session::flash('message', 'User Group Created Successfully');
        }
        UserGroup::create($fromData);
        return redirect()->route('group.index');
    }


    public function destroy($id)
    {
        if(UserGroup::find($id)->delete())
        {
            Session::flash('message', 'User Group Deleted Successfully');
        }
        return redirect()->route('group.index');
    }
}
