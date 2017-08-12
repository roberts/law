<?php

namespace App\Http\Controllers;

use App\File;
use App\Contact;
use App\FileType;
use App\Source;
use App\Fileable;
use App\IntakeMask;
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
        $files = File::latest()->get();

        return view('files.index', compact('files'));
    }

    /**
     * Display a listing of the files that are leads.
     *
     * @return \Illuminate\Http\Response
     */
    public function leads()
    {
        $files = File::latest()->get();

        return view('files.leads', compact('files'));
    }

    /**
     * Display a listing of the files that are in pre-litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function pre()
    {
        $files = File::latest()->get();

        return view('files.pre', compact('files'));
    }

    /**
     * Display a listing of the files that are in litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function litigation()
    {
        $files = File::latest()->get();

        return view('files.litigation', compact('files'));
    }

    /**
     * Display a listing of the files that are closed.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        $files = File::latest()->get();

        return view('files.closed', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firms = Contact::where('counsel', '=', 1)->orderBy('id')->get();
        $contacts = Contact::latest()->get();
        $file_types = FileType::latest()->get();
        $sources = Source::orderBy('id', 'desc')->get();
        $referralfirms = Contact::where('type_id', '=', 3)->orderBy('id')->get();

        return view('files.create', compact('firms', 'contacts', 'file_types', 'sources', 'referralfirms'));
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
                'counsel' => 'required|min:1|integer',
                'file_type_id' => 'required|min:1|integer',
                'source_id' => 'required|min:1|integer',
                'referral_id' => 'nullable|min:1|integer'
            ]);

        $file = File::create([
                'file_number' => 'test-number-2',
                'counsel' => $request->counsel,
                'file_type_id' => $request->file_type_id,
                'source_id' => $request->source_id,
                'referral_id' => $request->referral_id ?: null,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);

        $newfile = File::latest()->first();

        if ($request->file_type_id  == 1) {
            $maskintake = IntakeMask::create([
                'client_id' => $request->client_id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
            $intake = IntakeMask::latest()->first();
            $fileable_type = 'App\IntakeMask';
        }

        $fileble = Fileable::create([
                'file_id' => $newfile->id,
                'fileable_type' => $fileable_type,
                'fileable_id' => $intake->id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);

        session()->flash('message', 'Thanks for adding a File');

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
