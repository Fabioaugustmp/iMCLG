<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    //

    public function createConstruction(){
        return view('construction.construction-create');
    }

    public function listAllConstruction(){

        $constructions = Construction::all();

        return view('construction.construction', [
            'constructions' => $constructions
        ]);
    }

    public function listConstruction(){
        return view('construction.construction-create');
    }

    public function updateConstruction(Construction $construction){
        return view('construction.construction-update', [
            'construction' => $construction
        ]);
    }

    public function editconstruction(Construction $construction, Request $request){

        $construction->description = $request->description;
        $construction->status = $request->status;

        $construction->save();

        return redirect()
        ->route('construction')
        ->with('success', 'Ativo atualizado com sucesso!');       
    }

    public function addConstruction(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required'
        ]);

        $data = $request->only(['name', 'description', 'status']);

        Construction::create($data);

        return redirect()
            ->route('construction')
            ->with('success', 'Ativo cadastrado com sucesso!');

    }
}
