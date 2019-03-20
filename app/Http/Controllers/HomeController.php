<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_task = \App\task::all();
        return view('home',['data_task' => $data_task]);
    }

    public function create(Request $request)
    {
        \App\task::create($request->all());
        return redirect('/home')->with('sukses','Task Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $task = \App\task::find($id);
        return view('home/edit',['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = \App\task::find($id);
        $task->update($request->all());
        return redirect('/home')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id)
    {
        $task = \App\task::find($id);
        $task->delete($task);
        return redirect('/home')->with('sukses','Data Berhasil dihapus');
    }
}
