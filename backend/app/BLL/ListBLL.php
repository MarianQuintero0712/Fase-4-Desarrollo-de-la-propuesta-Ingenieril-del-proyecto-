<?php

namespace App\BLL;

use App\DAL\ListDAL;

use App\Models\Menu;

class ListBLL{

    public static function lists(array $request)
    {
        return response()->json(['data' => ListDAL::lists($request)]);
    }

    public static function create(array $request)
    {
        return ListDAL::create($request);
    }

    public static function delete(string $id)
    {
        // Llamamos al método de eliminación en el Data Access Layer (DAL)
        $result = ListDAL::delete($id);
        
        // Verificamos si la eliminación fue exitosa (asumimos que 1 significa éxito)
        if ($result == 1) {
            // Retornamos una respuesta de éxito con un mensaje adecuado
            return response()->json([
                'message' => 'Lista eliminada correctamente.'
            ], 200); // Código HTTP 200 significa OK
        } else {
            // En caso de que no se haya eliminado (o si el ID no se encontró), devolvemos un mensaje de error
            return response()->json([
                'message' => 'No se pudo eliminar la lista. Verifique el ID.'
            ], 400); // Código HTTP 400 significa Bad Request
        }
    }

    public static function getShoppingList(string $id)
    {
        return response()->json([ 'data' => ListDAL::getShoppingList($id)]);
    }
    
    public static function addShoppingList(array $data)
    {
        // Obtener parámetros de consulta
        $menuId = $data['menuId'];
        $shopping_list = [];
    
        // Buscar el menú por el ID dentro del JSON
        $menu = Menu::whereJsonContains('menu->id', (string) $menuId)->first();
    
        if ($menu) {
            // Decodificar el JSON almacenado en el campo 'menu'
            $menuData = json_decode($menu->menu, true);
    
            // Validar que 'shopping_list' exista y sea un array
            if (isset($menuData['shopping_list']) && is_array($menuData['shopping_list'])) {
                $shopping_list = $menuData['shopping_list'];

                $result = ListDAL::addShoppingList($data['shoppingListId'], $shopping_list);
                if ($result) {
                    return response()->json(['message' => 'Los ingredientes del menu han sido añadidos satisfctoriamente a la lista de compras']);
                } else {
                    return response()->json([
                        'message' => 'Ha ocurrido un error al añadir los ingredientes a la lista de compras'
                    ], 400); // Código HTTP 400 significa Bad Request
                }
            } else {

                return response()->json([
                    'message' => 'El menú no contiene una lista de compras válida.'
                ], 400); // Código HTTP 400 significa Bad Request
            }
        }
    
        return response()->json([
            'message' => 'No se pudo encontrar el menú. Verifique el ID.'
        ], 400);
    }
    
    
}