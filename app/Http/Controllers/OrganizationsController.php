<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
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
        $organizations = Organization::latest()->get();

        return view('contacts.organizations.index', compact('organizations'));
    }

    /**
     * Display a listing of the LLC's.
     *
     * @return \Illuminate\Http\Response
     */
    public function firm()
    {
        $organizations = Organization::where('type_id', '=', 3)->latest()->get();

        // If 'partner' = 1, then the firm is a co-counsel with RLO on some cases. Use different icon for these.

        return view('contacts.organizations.firm', compact('organizations'));
    }

    /**
     * Display a listing of the corporations.
     *
     * @return \Illuminate\Http\Response
     */
    public function corporation()
    {
        $organizations = Organization::where('type_id', '=', 4)->latest()->get();

        return view('contacts.organizations.corporation', compact('organizations'));
    }

    /**
     * Display a listing of the LLC's.
     *
     * @return \Illuminate\Http\Response
     */
    public function llc()
    {
        $organizations = Organization::where('type_id', '=', 5)->latest()->get();

        return view('contacts.organizations.llc', compact('organizations'));
    }

    /**
     * Display a listing of the other types of organizations.
     *
     * @return \Illuminate\Http\Response
     */
    public function other()
    {
        $organizations = Organization::where('type_id', '>', 5)->latest()->get();

        return view('contacts.organizations.other', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.organizations.create');
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
                'display_name' => ['required', 'unique:contacts,display_name', 'min:5', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'type_id' => 'required|min:1|max:1|integer',
                'address' => 'required|min:5|max:255',
                'city' => 'required|min:5|max:255',
                'state' => 'required|min:2|max:2|alpha',
                'zip' => 'required|min:5|max:99999|integer',
                'corp_name' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'dba' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'branch' => ['nullable', 'max:255', 'regex:/^(\s)*[A-Za-z]+((\s)?((\'|\-|\.|\_)?([A-Za-z0-9()])+))*(\s)*$/'],
                'ein' => 'nullable|min:10|max:10|regex:/^[0-9]\d{1}-\d{7}$/',
                'corp_state' => 'nullable|min:2|max:2|alpha',
                'work_phone' => 'nullable|min:12|max:12|regex:/^[2-9]\d{2}-\d{3}-\d{4}$/',
                'website' => 'nullable|max:255',
                'fax' => 'nullable|min:12|max:12|regex:/^[2-9]\d{2}-\d{3}-\d{4}$/'
            ]);

        $remove = array(".", "_", "/", "\'", "(", ")");

        $contact = Person::create([
                'display_name' => $request->display_name,
                'slug' => str_replace($remove, "", str_replace(" ", "-", strtolower($request->display_name))),
                'type_id' => $request->type_id,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'corp_name' => $request->corp_name ?: null,
                'dba' => $request->dba ?: null,
                'branch' => $request->branch ?: null,
                'ein' => $request->ein ?: null,
                'corp_state' => $request->corp_state ?: null,
                'work_phone' => $request->work_phone ?: null,
                'website' => $request->website ?: null,
                'fax' => $request->fax ?: null,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view('contacts.organizations.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
