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

    public function scopeFirstName($query , $value){
        if($value){
            return $query->where('first_name' , 'like' , "%". $value ."%");
        }
    }

    public function scopeFilter($query , $filters){
        if($filters){
            return $query->when($filters['search'] ?? false , function($query , $search){
                $query->where('first_name' , 'LIKE' , "%".$search."%" )
                ->orWhere('last_name' , 'LIKE' , "%".$search."%" )
                ->orWhere('city' , 'LIKE' , "%".$search."%" )
                ->orWhere('phone' , 'LIKE' , "%".$search."%" )
                ->orWhereHas('organization' , function($query )use($search){
                    $query->where('name' , 'LIKE' , "%". $search . "%" );
                });
            });
        }
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
