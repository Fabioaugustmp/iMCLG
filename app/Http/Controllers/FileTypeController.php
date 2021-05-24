<?php

namespace App\Http\Controllers;

use App\Models\FileType;
use Illuminate\Http\Request;

class FileTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filetype = FileType::all();

        return view('filetype.filetype', [
            'filetype' => $filetype
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filetype.filetype-create');
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $data = $request->only('name', 'description', 'status');

        FileType::create($data);

        return redirect('filetype')->with('success', $data['name'] . ' cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileType  $fileType
     * @return \Illuminate\Http\Response
     */
    public function show(FileType $filetype)
    {
        
        return view('filetype.filetype-update', [
            'filetype' => $filetype
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileType  $fileType
     * @return \Illuminate\Http\Response
     */
    public function edit(FileType $fileType)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileType  $fileType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileType $fileType)
    {        

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $fileType->name = $request->name;
        $fileType->description = $request->description;
        $fileType->status = $request->status;

        $fileType->save();        

        return redirect('filetype')->with('success', $fileType->name . ' atualizado com sucesso!' );
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileType  $fileType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileType $fileType)
    {
        //
    }
}
