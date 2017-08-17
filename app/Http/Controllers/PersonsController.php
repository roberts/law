<?php

namespace App\Http\Controllers;

use App\Person;
use App\Note;
use Illuminate\Validation\Rule;
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
        $persons = Person::latest()->get();

        return view('contacts.persons.index', compact('persons'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function male()
    {
        $persons = Person::where('type_id', '=', 1)->latest()->get();

        return view('contacts.persons.male', compact('persons'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function female()
    {
        $persons = Person::where('type_id', '=', 2)->latest()->get();

        return view('contacts.persons.female', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.persons.create');
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
                'display_name' => ['required', 'unique:contacts,display_name', 'min:5', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9().,-_&\'])+))*(\s)*$/'],
                'email' => 'nullable|email|min:5|max:255',
                'type_id' => 'required|min:1|integer',
                'address' => 'required|min:5|max:255',
                'city' => 'required|min:5|max:255',
                'state' => 'required|min:2|max:2|alpha',
                'zip' => 'required|min:5|max:99999|integer',
                'first_name' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'middle_name' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'last_name' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'prefix' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'suffix' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'initials' => 'nullable|min:2|max:3|alpha',
                'informal_greeting' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'title' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'website' => 'nullable|max:255',
                'fax' => 'nullable|min:12|max:12|regex:/^[2-9]\d{2}-\d{3}-\d{4}$/',
                'cell_phone' => 'nullable|min:12|max:12|regex:/^[2-9]\d{2}-\d{3}-\d{4}$/',
                'home_phone' => 'nullable|min:12|max:12|regex:/^[2-9]\d{2}-\d{3}-\d{4}$/',
                'work_phone' => 'nullable|min:12|max:12|regex:/^[2-9]\d{2}-\d{3}-\d{4}$/',
                'birth_date' => 'nullable|date|max:255',
                'birth_city' => 'nullable|min:5|max:255',
                'birth_state' => 'nullable|min:2|max:2|alpha',
                'ssn' => 'nullable|min:11|max:11|regex:/^[0-9]\d{2}-\d{2}-\d{4}$/',
                'dln' => 'nullable|max:255',
                'dl_state' => 'nullable|min:2|max:2|alpha'
            ]);

        $remove = array(".", "_", "/", "'", "(", ")", ",", "&");

        if ($request->ssn) {
            $request->merge(array('ssn' => bcrypt($request->ssn)));
        }
        if ($request->dln) {
            $request->merge(array('dln' => bcrypt($request->dln)));
        }

        $contact = Person::create([
                'display_name' => $request->display_name,
                'slug' => str_replace("--", "-", str_replace($remove, "", str_replace(" ", "-", strtolower($request->display_name)))),
                'email' => $request->email ?: null,
                'type_id' => $request->type_id,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'first_name' => $request->first_name ?: null,
                'middle_name' => $request->middle_name ?: null,
                'last_name' => $request->last_name ?: null,
                'prefix' => $request->prefix ?: null,
                'suffix' => $request->suffix ?: null,
                'initials' => $request->initials ?: null,
                'informal_greeting' => $request->informal_greeting ?: null,
                'title' => $request->title ?: null,
                'website' => $request->website ?: null,
                'fax' => $request->fax ?: null,
                'cell_phone' => $request->cell_phone ?: null,
                'home_phone' => $request->home_phone ?: null,
                'work_phone' => $request->work_phone ?: null,
                'birth_date' => $request->birth_date ?: null,
                'birth_city' => $request->birth_city ?: null,
                'birth_state' => $request->birth_state ?: null,
                'ssn' => $request->ssn ?: null,
                'dln' => $request->dln ?: null,
                'dl_state' => $request->dl_state ?: null,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);

        session()->flash('message', 'Thanks for adding a Person');

        $newperson = Person::latest()->first();

        return redirect($newperson->path());
    }

    /**
     * Store a new note for this person.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Person $person, Request $request)
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
        $person->notes()->save($note);
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
        return view('contacts.persons.show', compact('person'));
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
