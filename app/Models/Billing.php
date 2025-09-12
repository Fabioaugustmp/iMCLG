<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'title',
        'description',
        'value',
        'expiration_date',
        'pdf_path',
        'payment_status',
        'month_reference',
    ];

    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }
}
