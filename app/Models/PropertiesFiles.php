<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_propertie',
        'name',
        'filetype',
        'path'
    ];

    public function properties(){
        return $this->belongsTo(Properties::class, 'properties_id', 'id');
    }
}
