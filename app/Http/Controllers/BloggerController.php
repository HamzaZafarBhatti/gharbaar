<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bloggers = Blogger::all();
        return view('bloggers.index', compact('bloggers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bloggers.create');
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
            Blogger::create($data);
            Session::flash('success', 'Blogger added!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        if(config('auth.defaults.guard') === 'admin') {
            return redirect()->route('admin.bloggers.index');
        } else {
            return redirect()->route('user.bloggers.index');
        }
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
        $blogger = Blogger::find($id);
        return view('bloggers.edit', compact('blogger'));
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
            if($request->password) {
                $data['password'] = bcrypt($request->password);
            }
            // return $data;
            $blogger = Blogger::find($id);
            $blogger->update($data);
            Session::flash('success', 'Blogger updated!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        if(config('auth.defaults.guard') === 'admin') {
            return redirect()->route('admin.bloggers.index');
        } else {
            return redirect()->route('user.bloggers.index');
        }
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
            $blogger = Blogger::find($id);
            $blogger->delete();
            Session::flash('deleted', 'Blogger deleted!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        if(config('auth.defaults.guard') === 'admin') {
            return redirect()->route('admin.bloggers.index');
        } else {
            return redirect()->route('user.bloggers.index');
        }
    }
}
