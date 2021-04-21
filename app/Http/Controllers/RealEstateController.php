<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    //

    public function listAllRealEstate(){

        $realestates = RealEstate::all();

        return view('realestate.realestate', [
            'realestates' => $realestates
        ]);
    }

    public function showRealEstate(){
        return view('realestate.realestate-create');
    }

    public function updateRealEstate(RealEstate $realestate){
        return view('realestate.realestate-update', [
            'realestate' => $realestate
        ]);
    }

    public function addRealEstate(Request $request){

        $this->validate($request, [
            'realestate' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required'
        ]);

        $data = $request->only(['realestate', 'description', 'status']);

        RealEstate::create($data);

        return redirect()
            ->route('realestate')
            ->with('success', 'Ativo cadastrado com sucesso!');

    }


}
