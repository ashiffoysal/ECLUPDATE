<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ExamRequest;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'social_id',
        'social_type',
        'is_verified',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function exams()
    {
       
        return $this->belongsTo(ExamRequest::class, 'id', 'user_id')->select(['main_exam_type']);
    }

    public function Division()
    {
        return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\Division', 'division', 'id');
    }
    public function District()
    {
        return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\District', 'district', 'id');
    }

    public function Selectedtutor(){
        return $this->belongsTo('App\Models\SelectedTutorSubject','id','tutor_id');
    }
}
