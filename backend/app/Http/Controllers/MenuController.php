<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function menus(Request $request)
    {
        // Obtener parámetros de consulta
        $id = $request->query('id');
        $type = $request->query('type');
    
        // Buscar un menú por ID
        if ($id) {
            $menu = Menu::whereJsonContains('menu->id', (string) $id)->first();
    
            if ($menu) {
                // Decodificar el JSON antes de retornarlo
                return response()->json(['data' => json_decode($menu->menu, true)]);
            }
        }
        // Buscar menús por tipo
        elseif ($type) {
            $menus = Menu::whereJsonContains('menu->type', (string) $type)->get();
    
            if ($menus->isNotEmpty()) {
                // Decodificar el JSON de cada registro
                $decodedMenus = $menus->map(function ($menu) {
                    return json_decode($menu->menu, true);
                });
    
                return response()->json(['data' => $decodedMenus]);
            }
        }
        // Devolver todos los menús
        else {
            $menus = Menu::all();
    
            // Decodificar el JSON de todos los registros
            $decodedMenus = $menus->map(function ($menu) {
                return json_decode($menu->menu, true);
            });
    
            return response()->json(['data' => $decodedMenus]);
        }
    
        // Si no se encuentra el menú, devolver error 404
        return response()->json(['error' => 'Menú no encontrado'], 404);
    }
}
