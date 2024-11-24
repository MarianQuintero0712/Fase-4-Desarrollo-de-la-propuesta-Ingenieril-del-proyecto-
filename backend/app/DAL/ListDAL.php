<?php

namespace App\DAL;

use App\Models\ShoppingList;
use App\Models\Lista;

class ListDAL{

    public static function lists(array $request)
    {
        return Lista::where('user_id', auth()->user()->id)->get();
    }

    public static function create(array $request)
    {
        return Lista::create([
            'user_id' => auth()->user()->id,
            'name' => $request['name'],
            'description' => $request['description']
        ]);
    }

    public static function delete(string $id)
    {
        return Lista::where('id', $id)->delete();
    }

    public static function getShoppingList(string $id)
    {
        return ShoppingList::where('list_id', $id)->get();
    }
 
    public static function addShoppingList(string $listId, array $shopping_list)
    {
        return ShoppingList::create([
            'list_id' => $listId,
            'shopping_list' => json_encode($shopping_list)
        ]);
    }

}