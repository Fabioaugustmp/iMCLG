<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    use HasFactory;

    protected $filable = [
        'name',
        'email',
        'cpf',
        'status',
    ];

    public function properties(){
        return $this->belongsToMany(Properties::class, 'properties_associates', 'associates', 'properties');
    }
}
