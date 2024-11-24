<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'lists';
    protected $fillable = ['user_id','name','description'];
}
