<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable  = [
      'email',
      'score_1',
      'percentage_1',
      'score_2',
      'percentage_2',
      'attempt'
   ];
}
