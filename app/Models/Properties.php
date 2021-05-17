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
        'company',
        'feedback',
        'latitude',
        'longitude'
    ];

    public function images()
    {
        return $this->hasMany(PropertiesImages::class, 'id_properties', 'id');
    }

    public function files()
    {
        return $this->hasMany(PropertiesFiles::class, 'id_properties', 'id');
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'properties_partners', 'properties', 'partners')->withPivot(['partial_value', 'manager'])->withTimestamps();

        //return $this->belongsToMany(Associate::class)->withTimestamps()->withPivot(['partial_value']);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'id_propertie', 'id');
    }
}
