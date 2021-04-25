<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use App\Models\Construction;
use App\Models\Properties;
use App\Models\StatusProperties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //

    public function createPropertie()
    {

        $realestate = RealEstate::all();
        $constructions = Construction::all();
        $statusproperties = StatusProperties::all();

        return view('properties.properties-create', [
            'realestate' => $realestate,
            'constructions' => $constructions,
            'statusproperties' => $statusproperties
        ]);
    }

    public function listaAllProperties()
    {
        return view('properties.properties');
    }


    public function addProperties(Request $request)
    {

        $this->validate($request, [
            'realestate' => 'required',
            'statusproperties' => 'required',
            'cep' => 'required|max:9',
            'logradouro' => 'required|min:5',
            'bairro' => 'required|min:5',
            'cidade' => 'required|min:5',
            'uf' => 'required|min:2',
            'areatotal' => 'required|Integer',
            'areaconstruida' => 'required|Integer',
            'valorvenal' => 'required|Integer' ,
            'valordaaquisicao' => 'required|Integer',
            'valordevenda' => 'required|Integer',
            'construction' => 'required',
            'feedback' => 'required|min:10'
        ]);

        $data = $request->only(['realestate',
        'statusproperties',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'uf',
        'areatotal',
        'areaconstruida',
        'valorvenal',
        'valordaaquisicao',
        'valordevenda',
        'construction',
        'feedback']);

        Properties::create($data);

        return redirect('properties');      
    }
}
