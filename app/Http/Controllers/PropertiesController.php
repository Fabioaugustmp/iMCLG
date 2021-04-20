<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //

    public function createPropertie(){
        return view('properties.properties-create');
    }

    public function listaAllProperties(){
        return view('properties.properties');
    }
}
