<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];
            // return $data;
            User::create($data);
            Session::flash('success', 'User added!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return $request;
        // return $id;
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }
            // return $data;
            $user = User::find($id);
            $user->update($data);
            Session::flash('success', 'User updated!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $user = User::find($id);
            $user->delete();
            Session::flash('deleted', 'User deleted!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect()->route('admin.users.index');
    }

    public function getAllUsers()
    {
        $users = User::all();
        $i = 1;
        foreach ($users as $user) {
            $data_array[] = [
                $i,
                $user->name,
                $user->email
            ];
            $i++;
        }
        return json_encode($data_array);
    }

    public function createUser(Request  $request)
    {
        // return $request;
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        // return $data;
        $user = User::create($data);
        return json_encode(['status' => $user]);
    }
}
