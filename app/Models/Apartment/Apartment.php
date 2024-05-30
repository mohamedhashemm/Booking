<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $tabel="apartments";


    protected $fillable = [
        'name',
        'image',
        'max_persons',
        'size',
        'view',
        'price',
        'num_beds',
        'hotel_id',
    ];

    public $timestamps =true;
}
