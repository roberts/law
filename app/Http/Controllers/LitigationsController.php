<?php

namespace App\Http\Controllers;

use App\Litigation;
use Illuminate\Http\Request;

class LitigationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Litigation  $litigation
     * @return \Illuminate\Http\Response
     */
    public function show(Litigation $litigation)
    {
        //
    }

    /**
     * Store a new note for this litigation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Litigation $litigation, Request $request)
    {
        $this->validate($request, [
                'note' => 'required|min:5|max:2000',
                'broadcast' => ['required', Rule::in(['none', 'firm', 'all'])
            ]);
        $note = new App\Note([
                'note' => $request->note,
                'broadcast' => $request->broadcast
            ]);
        $litigation->notes()->save($note);
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
