<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use App\Models\StatusProperties;
use Illuminate\Http\Request;

class StatusPropertiesController extends Controller
{
    //
    public function createSP(){
        return view('statusproperties.statusproperties-create');
    }

    public function listAllSP(){
        $statusproperties = StatusProperties::all();

        return view('statusproperties.statusproperties', [
            'statusproperties' => $statusproperties
        ]);
    }

    public function addStatusProperties(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required'
        ]);

        $data = $request->only(['name' , 'description', 'status']);

        StatusProperties::create($data);

        return redirect('statusproperties')
        ->with('success', 'Ativo '. $data['name'] .' cadastrado com sucesso');

    }

    public function updateStatusProperties(StatusProperties $statusproperties){

        return view('statusproperties.statusproperties-update', [
            'statusproperties' => $statusproperties
        ]);

    }

    public function editStatusProperties(StatusProperties $statusproperties, Request $request){

        $statusproperties->name = $request->name;
        $statusproperties->description = $request->description;
        $statusproperties->status = $request->status;

        $statusproperties->save();

        return redirect()
        ->route('statusproperties')
        ->with('success', $statusproperties->name . ' atualizado com sucesso!');

        

    }
}
