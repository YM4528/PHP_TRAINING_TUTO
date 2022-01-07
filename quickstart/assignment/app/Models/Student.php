<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function major()
    {
        return $this->belongsTo('App\Models\Major');
    }

    protected $fillable=[
        'name',
        'email',
        'major_id',
        'city',
        'deleted_at'
    ];
}
