<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\RealEstate;
use App\Models\Construction;
use App\Models\Partner;
use App\Models\Properties;
use App\Models\PropertiesFiles;
use App\Models\PropertiesImages;
use App\Models\StatusProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
    //

    public function createPropertie(Properties $properties)
    {

        $realestate = RealEstate::all();
        $constructions = Construction::all();
        $statusproperties = StatusProperties::all();
        $partners = Partner::all();

        return view('properties.properties-create', [
            'realestate' => $realestate,
            'constructions' => $constructions,
            'statusproperties' => $statusproperties,
            'partners' => $partners
        ]);
    }

    public function listaAllProperties(Properties $properties)
    {
        $properties = Properties::all();

        return view('properties.properties', [
            'properties' => $properties
        ]);
    }

    public function searchPropertie(Properties $properties, Request $request){

        $search = $request->get('search');

        // $properties = DB::table('properties')->where('name', 'like', '%'.$search. '%');
        //  $properties = $properties->find($search)->images;

        $properties = DB::table('properties')->where('realestate', 'like', '%'.$search.'%')->get();

        return view('properties.properties-search', [
            'properties' => $properties
        ]);

    }

    public function showPropertie(Properties $properties)
    {

        $associates = $properties->associates()->get();

        return view('properties.properties-show', [
            'properties' => $properties, 
            'associates' => $associates
        ]);
    }


    public function addProperties(Request $request)
    {

        // dd($request, $request->hasFile('pictures'), $request->hasFile('files'));

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
            'valorvenal' => 'required|Integer',
            'valordaaquisicao' => 'required|Integer',
            'valordevenda' => 'required|Integer',
            'construction' => 'required',
            'feedback' => 'required|min:10'
        ]);

        //$request->file('pictures')->store('teste');

        $data = $request->only([
            'realestate',
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
            'feedback'
        ]);

        $properties = Properties::create($data);

        if ($request->hasFile('pictures')) {

            for ($i = 0; $i < count($request->allFiles()['pictures']); $i++) {

                $images = $request->allFiles()['pictures'][$i];

                $propertiesImages = new PropertiesImages();
                $propertiesImages->id_properties = $properties->id;
                $propertiesImages->path = $images->store('properties/images/' . $properties->id);
                $propertiesImages->save();
                unset($propertiesImages);
            }
        }

        if ($request->hasFile('files')) {

            for ($i = 0; $i <  count($request->allFiles()['files']); $i++) {

                $files = $request->allFiles()['files'][$i];

                $propertiesFiles = new PropertiesFiles();
                $propertiesFiles->id_properties = $properties->id;
                $propertiesFiles->path = $files->store('properties/files/' . $properties->id);
                $propertiesFiles->save();
                unset($propertiesFiles);
            }
        }

        return redirect('properties');
    }
}
