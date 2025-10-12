<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Examessuedate;

class ExamRequest extends Model
{
    use HasFactory;
    
    public function mainseries(){
        return $this->belongsTo(Examessuedate::class, 'exam_series', 'id');
    }
}
