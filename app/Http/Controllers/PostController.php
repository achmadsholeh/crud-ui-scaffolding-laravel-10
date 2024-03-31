<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Http\RedirectResponse;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $posts = post::All();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname'  => 'required',
            'age'       => 'required'
        ]);

        post::create([
            'firstname' =>$request->firstname,
            'lastname'  =>$request->lastname,
            'age'       =>$request->age
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil disimpan']);
    }

    public function show($id){
        $posts = post::findorfail($id);
        return view('posts.show', compact('posts'));
    }

    public function edit($id)
    {
        $posts = post::findorfail($id);
        return view('posts.edit', compact('posts'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname'  => 'required',
            'age'       => 'required'
        ]);

        $posts = post::findorfail($id);
        $posts->update($request->all());

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil di update']);
    }

    public function destroy($id)
    {
        $posts = post::findorfail($id);
        $posts->delete();

        return redirect()->route('posts.index')->with(['danger' => 'Data Berhasil di hapus']);
    }
    
}
