<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'status',
    ];

    public function properties(){
        return $this->belongsToMany(Properties::class, 'properties_partners', 'partners', 'properties')->withTimestamps();
    }


}
