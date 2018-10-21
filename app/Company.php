<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name'
    ];

    public function references()
    {
        return $this->hasMany(Reference::class, 'company_id', 'id');
    }
}
