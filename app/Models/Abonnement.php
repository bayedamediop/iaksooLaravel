<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'nombre',
        'prix',
        'user_id',
    ];

    /**
     * Get the user for the user.
     */
    public function user(){
        return  $this->belongsTo(User::class);
    }
}
