<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $fillable = [
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
}
