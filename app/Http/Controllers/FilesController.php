<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FilesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy('id')->get();

        return view('files.index', compact('files'));
    }

    /**
     * Display a listing of the files that are leads.
     *
     * @return \Illuminate\Http\Response
     */
    public function leads()
    {
        $files = File::orderBy('id')->get();

        return view('files.leads', compact('files'));
    }

    /**
     * Display a listing of the files that are in pre-litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function pre()
    {
        $files = File::orderBy('id')->get();

        return view('files.pre', compact('files'));
    }

    /**
     * Display a listing of the files that are in litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function litigation()
    {
        $files = File::orderBy('id')->get();

        return view('files.litigation', compact('files'));
    }

    /**
     * Display a listing of the files that are closed.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        $files = File::orderBy('id')->get();

        return view('files.closed', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['display_name' => 'required|min:8|unique:authors|max:255']);
        $this->validate($request, ['last_name' => 'required|min:3|max:255']);
        $this->validate($request, ['slug' => 'required|unique:authors|max:255']);

        $quoteauthor = QuoteAuthor::create([
            'slug' => request('slug'),
            'display_name' => request('display_name'),
            'last_name' => request('last_name'),
            'created_by' => auth()->id()
        ]);

        session()->flash('message', 'Thanks for adding an author');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
