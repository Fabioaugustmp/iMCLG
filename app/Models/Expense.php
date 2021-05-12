<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_propertie',
        'expensetype',
        'classexpense',
        'includedate',
        'expiredate',
        'paymentdate',
        'competence',
        'value',
        'observations'
    ];

    public function propertie(){
        return $this->belongsTo(Properties::class, 'id_propertie', 'id');
    }
}
