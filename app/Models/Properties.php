<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

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
        'dataaquisicao',
        'valordevenda',
        'dataavaliacao',
        'construction',
        'company_id',
        'user_id', // Add user_id to fillable
        'feedback',
        'latitude',
        'longitude'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Add user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function billings()
    {
        return $this->hasMany(Billing::class, 'property_id');
    }
}
