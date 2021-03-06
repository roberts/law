<?php

namespace App\Http\Controllers;

use App\File;
use App\FileType;
use App\Contact;
use App\Source;
use App\Note;
use App\Status;
use App\Relation;
use App\IntakeMask;
use App\IntakeDui;
use App\IntakeWreck;
use App\IntakeFall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $files = File::with('current.status')->latest()->get();

        return view('files.index', compact('files'));
    }

    /**
     * Display a listing of the files that are leads.
     *
     * @return \Illuminate\Http\Response
     */
    public function leads()
    {
        $files = File::with('current.status')->fileleads()->get();

        return view('files.leads', compact('files'));
    }

    /**
     * Display a listing of the files that are in pre-litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function pre()
    {
        $files = File::with('current.status')->prelitigationfiles()->get();

        return view('files.pre', compact('files'));
    }

    /**
     * Display a listing of the files that are in litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function litigation()
    {
        $files = File::with('current.status')->litigationfiles()->get();

        return view('files.litigation', compact('files'));
    }

    /**
     * Display a listing of the files that are closed.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        $files = File::with('current.status')->closedfiles()->get();

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
                'counsel_id' => 'required|min:1|integer',
                'file_type_id' => 'required|min:1|integer',
                'source_id' => 'required|min:1|integer',
                'referral_id' => 'nullable|min:1|integer'
            ]);

        $day = Carbon::now('America/Kentucky/Louisville');
        $number = File::whereMonth('created_at', Carbon::parse($day)->month)->count();
        $number = $number + 1;
        $file_number = $day->year .'-'. str_pad($day->month, 2, '0', STR_PAD_LEFT) .'-'. str_pad($number, 5, '0', STR_PAD_LEFT);

        $file = File::create([
                'file_number' => $file_number,
                'counsel_id' => $request->counsel_id,
                'file_type_id' => $request->file_type_id,
                'source_id' => $request->source_id,
                'referral_id' => $request->referral_id ?: null,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);

        $newfile = File::latest()->first();

        if ($newfile->file_type_id  == 1) {
            $intake = IntakeMask::create([
                'client_id' => $request->client_id,
                'file_id' => $newfile->id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        }
        if ($newfile->file_type_id  == 2) {
            $intake = IntakeDui::create([
                'client_id' => $request->client_id,
                'file_id' => $newfile->id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        }
        if ($newfile->file_type_id  == 3) {
            $intake = IntakeWreck::create([
                'client_id' => $request->client_id,
                'file_id' => $newfile->id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        }
        if ($newfile->file_type_id  == 4) {
            $intake = IntakeFall::create([
                'client_id' => $request->client_id,
                'file_id' => $newfile->id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        }

        $newfile->statuses()->attach(5, ['created_by' => auth()->id()]);

        session()->flash('message', 'Thanks for adding a File');

        return redirect($newfile->path());
    }

    /**
     * Store a new note for this file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(FileType $filetype, File $file, Request $request)
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
        $file->notes()->save($note);
        return back();
    }

    /**
     * Store a new relation for this file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRelation(FileType $filetype, File $file, Request $request)
    {
        $this->validate($request, [
                'relationship_id' => 'required|min:1|integer',
                'related_id' => 'required|min:1|integer',
                'client_id' => 'required|min:1|integer'
            ]);
        $file->relations()->attach($request->related_id, [
                'relationship_id' => $request->relationship_id,
                'client_id' => $request->client_id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        return back();
    }

    /**
     * Store a new status for this file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStatus(FileType $filetype, File $file, Request $request)
    {
        $this->validate($request, [
                'status_id' => 'required|min:1|integer'
            ]);
        $file->statuses()->attach($request->status_id, [
                'created_by' => auth()->id()
            ]);
        return back();
    }

    /**
     * Store a new client for this file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClient(FileType $filetype, File $file, Request $request)
    {
        $this->validate($request, [
                'client_id' => 'required|min:1|integer'
            ]);
        if ($file->file_type_id  == 3) {
            $intake = IntakeWreck::create([
                'client_id' => $request->client_id,
                'file_id' => $file->id,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id()
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(FileType $filetype, File $file)
    {
        if ($file->current->status->id == 5) {
            $statusoptions = Status::whereIn('id', [6, 24, 25])->orderBy('id', 'asc')->get();
        } else if ($file->current->status->id == 6) {
            $statusoptions = Status::whereIn('id', [7, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 7) {
            $statusoptions = Status::whereIn('id', [8, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 8) {
            $statusoptions = Status::whereIn('id', [9, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 9) {
            $statusoptions = Status::whereIn('id', [10, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 10) {
            $statusoptions = Status::whereIn('id', [11, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 11) {
            $statusoptions = Status::whereIn('id', [12, 13, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 12) {
            $statusoptions = Status::whereIn('id', [13, 23, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 13) {
            $statusoptions = Status::whereIn('id', [12, 14, 20, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 14) {
            $statusoptions = Status::whereIn('id', [15, 20, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 15) {
            $statusoptions = Status::whereIn('id', [16, 20, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 16) {
            $statusoptions = Status::whereIn('id', [17, 20, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 17) {
            $statusoptions = Status::whereIn('id', [18, 20, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 18) {
            $statusoptions = Status::whereIn('id', [20, 21, 22, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 19) {
            $statusoptions = Status::whereIn('id', [20, 21, 22, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 20) {
            $statusoptions = Status::whereIn('id', [14, 15, 16, 17, 18, 23, 24, 25])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 21) {
            $statusoptions = Status::whereIn('id', [19])->orderBy('id', 'asc')->get();
        } else if  ($file->current->status->id == 22) {
            $statusoptions = Status::whereIn('id', [19])->orderBy('id', 'asc')->get();
        } else {
            $statusoptions = Status::whereIn('id', [])->get();
        }
        $firms = Contact::where('counsel', '=', 1)->orderBy('id')->get();
        $contacts = Contact::whereNotIn('type_id', [3])->latest()->get();

        return view('files.show', compact('file', 'statusoptions', 'firms', 'contacts'));
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
    public function update(FileType $filetype, File $file, Request $request)
    {
        $this->validate($request, ['sol' => 'required|date']);
        File::where('id', $file->id)->update(['sol' => $request->sol]);
        return back();
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
