<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class PersonComment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'person_comments';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function people_data()
    {
        return $this->belongsTo(Person::class, 'fk_personId');
    }

    public function users_name()
    {
        return $this->belongsTo(User::class, 'fk_userId');
    }
}
