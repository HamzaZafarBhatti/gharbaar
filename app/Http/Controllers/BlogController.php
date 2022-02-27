<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
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
                'title' => $request->title,
                'content' => $request->content,
                'is_active' => $request->is_active,
                'blogger_id' => auth()->guard('blogger')->user()->id
            ];
            // return $data;
            Blog::create($data);
            Session::flash('success', 'Blog added!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect()->route('blogger.blogs.index');
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
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog'));
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
                'title' => $request->title,
                'content' => $request->content,
                'is_active' => $request->is_active,
            ];
            // return $data;
            $blog = Blog::find($id);
            $blog->update($data);
            Session::flash('success', 'Blog updated!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect()->route('blogger.blogs.index');
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
            $blog = Blog::find($id);
            $blog->delete();
            Session::flash('deleted', 'Blog deleted!');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong! ' . $e->getMessage());
        }
        return redirect()->route('blogger.blogs.index');
    }
}
