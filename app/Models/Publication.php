<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Publication extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'titre',
        'description',
        'lieu',
        'prix',
        'imageCouvertire',
        'type',
        'sexe',
        'reserve',
        'user_id',
        'archivage',
    ];
    /**
     * Get the use for the user.
     */
    public function user(){
        return  $this->belongsTo(User::class);
    }

    public function image(){
        return  $this->hasMany(Image::class);
    }
    public function reservation(){
        return  $this->hasMany(Reservation::class);
    }
}
