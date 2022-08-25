<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserCRUDController extends Controller
{

    public function index()
    {
    $data['users'] = User::orderBy('id','desc')->paginate(5);
    return view('users.index', $data);
    }

    public function create()
    {
    return view('users.create');
    }

    public function store(Request $request)
    {
    $request->validate([
    'password' => 'required',
    'email' => 'required',
    'name' => 'required',
    'address' => 'required',
    'type' => 'required',
    'active' => 'required'
    ]);
    $user = new User;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->name = $request->name;
    $user->type = $request->type;
    $user->address = $request->address;
    $user->active = $request->active;
    $user->save();
    return redirect()->route('users.index')
    ->with('success','Users has been created successfully.');
    }



    public function edit(User $user)
    {
    return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([

        'email' => 'required',
        'name' => 'required',
        'address' => 'required',
        'type' => 'required',
        'active' => 'required'
    ]);
    $user = User::find($id);
    $user->email = $request->email;
    $user->name = $request->name;
    $user->type = $request->type;
    $user->address = $request->address;
    $user->active = $request->active;
    $user->save();

    return redirect()->route('users.index')
    ->with('success','Users Has Been updated successfully');
    }

    public function destroy(User $user)
    {
    $user->delete();
    return redirect()->route('users.index')
    ->with('success','Users has been deleted successfully');
    }
}
