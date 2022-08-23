<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'country',
        'gender',
        'date_of_birth'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
