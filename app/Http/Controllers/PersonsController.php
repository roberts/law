<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
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
        $persons = Person::orderBy('id')->get();

        return view('persons.index', compact('persons'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function male()
    {
        $persons = Person::where('type_id', '=', 1)->orderBy('id')->get();

        return view('persons.male', compact('persons'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function female()
    {
        $persons = Person::where('type_id', '=', 2)->orderBy('id')->get();

        return view('persons.female', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'display_name' => 'required|min:5|max:255',
                'email' => 'nullable|min:5|max:255',
                'cell_phone' => 'nullable|min:7|max:20',
                'work_phone' => 'nullable|min:7|max:20',
                'address' => 'required|min:5|max:255',
                'city' => 'required|min:5|max:255',
                'state' => 'required|min:2|max:2',
                'zip' => 'required|min:5|max:10',
                'type_id' => 'required|min:1|max:1'
            ]);

        $this->create([
                'display_name' => $request->display_name,
                'email' => $request->email ?: null,
                'cell_phone' => $request->cell_phone ?: null,
                'work_phone' => $request->work_phone ?: null,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'type_id' => $request->type_id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('persons.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
