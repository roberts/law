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
