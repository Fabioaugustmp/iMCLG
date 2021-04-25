<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use App\Models\Construction;
use App\Models\StatusProperties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //

    public function createPropertie(){

        $realestate = RealEstate::all();
        $constructions = Construction::all();
        $statusproperties = StatusProperties::all();

        return view('properties.properties-create', [
            'realestate' => $realestate,
            'constructions' => $constructions,
            'statusproperties' => $statusproperties
        ]);
    }

    public function listaAllProperties(){
        return view('properties.properties');
    }
}
