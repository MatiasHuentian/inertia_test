<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'organization_id',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country_id',
        'postal_code',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
