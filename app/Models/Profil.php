<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'libelle',
        'archivage',
    ];

    public static function findOrFail($id)
    {
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
