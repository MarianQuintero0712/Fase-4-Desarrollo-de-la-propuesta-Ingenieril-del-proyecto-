<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BLL\ListBLL;

class ListController extends Controller
{
    public function lists(Request $request)
    {
        return ListBLL::lists($request->all());
    }

    public function create(Request $request)
    {
        return ListBLL::create($request->all());
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        return ListBLL::delete($id);
    }

    public function getShoppingList(Request $request)
    {
        $id = $request->route('id');
        return ListBLL::getShoppingList($id);
    }

    public function addShoppingList(Request $request)
    {
        return ListBLL::addShoppingList($request->all());
    }
}
