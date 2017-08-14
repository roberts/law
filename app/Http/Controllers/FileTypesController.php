<?php

namespace App\Http\Controllers;

use App\File;
use App\FileType;
use Illuminate\Http\Request;

class FileTypesController extends Controller
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
     * Display a listing of the files that are leads.
     *
     * @return \Illuminate\Http\Response
     */
    public function leads(FileType $filetype)
    {
        $files = File::where('file_type_id', '=', $filetype->id)->with('latestStatus')->whereHas('latestStatus', function($q){
                        $q->where('parent', '=', 1);
                      })->latest()->get();

        return view('files.leads', compact('files'));
    }

    /**
     * Display a listing of the files that are in pre-litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function pre(FileType $filetype)
    {
        $files = File::where('file_type_id', '=', $filetype->id)->with('latestStatus')->whereHas('latestStatus', function($q){
                        $q->where('parent', '=', 2);
                      })->latest()->get();

        return view('files.pre', compact('files'));
    }

    /**
     * Display a listing of the files that are in litigation.
     *
     * @return \Illuminate\Http\Response
     */
    public function litigation(FileType $filetype)
    {
        $files = File::where('file_type_id', '=', $filetype->id)->with('latestStatus')->whereHas('latestStatus', function($q){
                        $q->where('parent', '=', 3);
                      })->latest()->get();

        return view('files.litigation', compact('files'));
    }

    /**
     * Display a listing of the files that are closed.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed(FileType $filetype)
    {
        $files = File::where('file_type_id', '=', $filetype->id)->with('latestStatus')->whereHas('latestStatus', function($q){
                        $q->where('parent', '=', 4);
                      })->latest()->get();

        return view('files.closed', compact('files'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FileType $filetype)
    {
        $files = File::where('file_type_id', '=', $filetype->id)->with('latestStatus')->latest()->get();

        return view('files.index', compact('files'));
    }
}
