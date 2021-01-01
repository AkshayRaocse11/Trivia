<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $casts = [
    'mcq_your_answer' => 'array',
    ];
    public function users()
     {
        return $this->belongsTo(User::class,'name_id');
     }

}
