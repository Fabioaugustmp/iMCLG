<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
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
    ];

    public function images(){
        return $this->hasMany(PropertiesImages::class, 'id_properties', 'id');
    }

    public function files(){
        return $this->hasMany(PropertiesFiles::class, 'id_properties', 'id');
    }

    public function associates(){
        return $this->belongsToMany(Partner::class, 'properties_associates', 'properties', 'associates');
    }

    public function expenses(){
        return $this->hasMany(Expense::class, 'id_propertie', 'id');
    }
}
