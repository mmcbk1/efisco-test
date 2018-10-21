<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'title',
        'job_description',
        'email',
        'reference',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
