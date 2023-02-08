<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'exam_name',
        'subject_id',
        'date',
        'time'
      ];
}
