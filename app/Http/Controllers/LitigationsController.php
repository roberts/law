<?php

namespace App\Http\Controllers;

use App\Litigation;
use App\Note;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class LitigationsController extends Controller
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
        $litigations = Litigation::latest()->get();

        return view('files.litigation.index', compact('litigations'));
    }

    /**
     * Display a listing of the resource for each file type.
     *
     * @return \Illuminate\Http\Response
     */
    public function filetypeindex()
    {
        $litigations = Litigation::latest()->get();

        return view('files.litigation.filetypeindex', compact('litigations'));
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
    }

    /**
     * Store a new note for this litigation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(FileType $filetype, Litigation $litigation, Request $request)
    {
        $this->validate($request, [
                'note' => 'required|min:5|max:2000',
                'broadcast' => ['required', Rule::in(['none', 'firm', 'all'])]
            ]);
        $note = new Note([
                'note' => $request->note,
                'broadcast' => $request->broadcast,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        $litigation->notes()->save($note);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function show(FileType $filetype, Litigation $litigation)
    {
        return view('files.litigation.show', compact('litigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Litigation $litigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Litigation $litigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Litigation $litigation)
    {
        //
    }
}
