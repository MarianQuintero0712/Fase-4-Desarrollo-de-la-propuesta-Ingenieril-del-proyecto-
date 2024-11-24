<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'shopping_list';
    protected $fillable = ['list_id','shopping_list'];
}
