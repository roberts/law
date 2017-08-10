<?php

namespace App\Http\Controllers;

use App\IntakeMask;
use Illuminate\Http\Request;

class IntakeMasksController extends Controller
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
     * @param  \App\IntakeMask  $intakeMask
     * @return \Illuminate\Http\Response
     */
    public function show(IntakeMask $intakeMask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IntakeMask  $intakeMask
     * @return \Illuminate\Http\Response
     */
    public function edit(IntakeMask $intakeMask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IntakeMask  $intakeMask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntakeMask $intakeMask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IntakeMask  $intakeMask
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntakeMask $intakeMask)
    {
        //
    }
}
