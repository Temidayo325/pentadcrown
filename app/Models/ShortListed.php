<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortListed extends Model
{
    use HasFactory;

    protected $fillable = [
      'email'
    ];

    public function users()
    {
      return $this->hasOne(User::class, 'email', 'email');
   }
}
