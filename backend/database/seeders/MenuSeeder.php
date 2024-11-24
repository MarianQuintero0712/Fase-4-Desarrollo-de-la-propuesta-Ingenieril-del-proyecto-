<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'menu' => json_encode([
                'id' => '1',
                'image' => 'https://dannito.ddns.net/menulisto/images/9b38c057-9144-4b92-b1cf-539d2e33b813.png',
                'title' => 'Ensalada César',
                'description' => 'Ensalada César con pollo, crutones y aderezo casero.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '2 Pechugas de pollo a la parrilla',
                    '1 Lechuga romana',
                    '½ Taza de crutones',
                    '1 Taza de aderezo César',
                    'Queso parmesano rallado al gusto',
                ],
                'instructions' => [
                    'Cocina las pechugas de pollo a la parrilla y córtalas en tiras.',
                    'Lava y corta la lechuga romana.',
                    'En un tazón grande, mezcla la lechuga, pollo, crutones y aderezo César.',
                    'Espolvorea queso parmesano rallado al gusto y sirve.',
                ],
                'shopping_list' => [
                    'Pechugas de pollo',
                    'Lechuga romana',
                    'Crutones',
                    'Aderezo César',
                    'Queso parmesano',
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '2',
                'image' => 'https://dannito.ddns.net/menulisto/images/9eb1c0be-95d5-48b4-999e-8d742f4998df.png',
                'title' => 'Tostada Francesa',
                'description' => 'Tostadas francesas con miel y frutas frescas.',
                'type' => 'Desayuno',
                'ingredients' => [
                    '2 Rebanadas de pan',
                    '1 Huevo',
                    '½ Taza de leche',
                    '1 Cucharadita de canela',
                    'Frutas frescas (fresas, plátano, arándanos)',
                    'Miel al gusto',
                ],
                'instructions' => [
                    'Bate el huevo con la leche y canela.',
                    'Sumergen las rebanadas de pan en la mezcla.',
                    'Fría las tostadas en una sartén hasta que estén doradas.',
                    'Sirve con frutas frescas y un poco de miel.',
                ],
                'shopping_list' => [
                    'Pan',
                    'Huevo',
                    'Leche',
                    'Canela',
                    'Frutas frescas',
                    'Miel'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '3',
                'image' => 'https://dannito.ddns.net/menulisto/images/2b6c12a0-a0d0-499f-a0d5-987bfc0ff987.png',
                'title' => 'Spaghetti con Salsa Bolognesa',
                'description' => 'Espaguetis acompañados de salsa bolognesa casera.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '200g de espaguetis',
                    '250g de carne molida de res',
                    '1 Cebolla picada',
                    '2 Dientes de ajo picados',
                    '1 Taza de puré de tomate',
                    'Sal y pimienta al gusto',
                ],
                'instructions' => [
                    'Cocina los espaguetis según las instrucciones del paquete.',
                    'En una sartén, cocina la carne molida con la cebolla y ajo.',
                    'Añade el puré de tomate y cocina por 10 minutos.',
                    'Sirve los espaguetis con la salsa bolognesa.',
                ],
                'shopping_list' => [
                    'Espaguetis',
                    'Carne molida',
                    'Cebolla',
                    'Ajo',
                    'Puré de tomate',
                    'Sal y pimienta'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '4',
                'image' => 'https://dannito.ddns.net/menulisto/images/b97090d8-5a41-4bc3-8a03-569796863dd8.png',
                'title' => 'Sopa de Pollo',
                'description' => 'Sopa de pollo casera con zanahorias y fideos.',
                'type' => 'Cena',
                'ingredients' => [
                    '2 Pechugas de pollo',
                    '2 Zanahorias',
                    '½ Taza de fideos',
                    '1 Cebolla',
                    '2 Dientes de ajo',
                    'Sal y pimienta al gusto',
                ],
                'instructions' => [
                    'Cocina las pechugas de pollo en agua con sal.',
                    'Añade las zanahorias, cebolla y ajo picados.',
                    'Cuando todo esté cocido, agrega los fideos y cocina por 10 minutos más.',
                    'Sirve caliente.',
                ],
                'shopping_list' => [
                    'Pechugas de pollo',
                    'Zanahorias',
                    'Fideos',
                    'Cebolla',
                    'Ajo',
                    'Sal y pimienta'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '5',
                'image' => 'https://dannito.ddns.net/menulisto/images/220f3312-b8cc-460f-85cc-a67eec3bffc7.png',
                'title' => 'Avena con Frutas',
                'description' => 'Avena caliente con frutas frescas y miel.',
                'type' => 'Desayuno',
                'ingredients' => [
                    '1 Taza de avena',
                    '2 Tazas de leche',
                    'Frutas frescas (plátano, fresas, arándanos)',
                    'Miel al gusto',
                ],
                'instructions' => [
                    'Cocina la avena con la leche hasta que esté suave.',
                    'Sirve con las frutas frescas encima.',
                    'Añade miel al gusto.',
                ],
                'shopping_list' => [
                    'Avena',
                    'Leche',
                    'Frutas frescas',
                    'Miel'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '6',
                'image' => 'https://dannito.ddns.net/menulisto/images/65077c83-2b99-406f-afd2-e15a4bdd3afd.png',
                'title' => 'Tacos de Pollo',
                'description' => 'Tacos con pollo, cebolla y cilantro.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '2 Pechugas de pollo',
                    '4 Tortillas de maíz',
                    '1 Cebolla picada',
                    'Cilantro al gusto',
                    'Limón al gusto',
                ],
                'instructions' => [
                    'Cocina las pechugas de pollo y córtalas en tiras.',
                    'Calienta las tortillas y agrega el pollo.',
                    'Añade cebolla, cilantro y un poco de limón.',
                    'Sirve caliente.',
                ],
                'shopping_list' => [
                    'Pechugas de pollo',
                    'Tortillas de maíz',
                    'Cebolla',
                    'Cilantro',
                    'Limón'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '7',
                'image' => 'https://dannito.ddns.net/menulisto/images/4009a985-6081-4cd4-a3e3-47b47beead91.png',
                'title' => 'Pizza Margherita',
                'description' => 'Pizza con tomate, albahaca y mozzarella.',
                'type' => 'Cena',
                'ingredients' => [
                    '1 Masa de pizza',
                    '2 Tomates',
                    '200g de mozzarella',
                    'Albahaca fresca',
                    'Aceite de oliva',
                ],
                'instructions' => [
                    'Precalienta el horno a 180°C.',
                    'Extiende la masa de pizza y añade los tomates cortados.',
                    'Coloca la mozzarella y hornea por 15 minutos.',
                    'Añade albahaca fresca al servir.',
                ],
                'shopping_list' => [
                    'Masa de pizza',
                    'Tomates',
                    'Mozzarella',
                    'Albahaca',
                    'Aceite de oliva'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '8',
                'image' => 'https://dannito.ddns.net/menulisto/images/7c24acb4-5c8a-4ec3-bc0a-85418d1ffadd.png',
                'title' => 'Ensalada de Atún',
                'description' => 'Ensalada fresca de atún con tomates y pepino.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '1 Lata de atún',
                    '1 Tomate',
                    '½ Pepino',
                    'Hojas de lechuga',
                    'Aceite de oliva y vinagre',
                ],
                'instructions' => [
                    'Escurre el atún y mézclalo con tomate y pepino picados.',
                    'Coloca las hojas de lechuga en un plato y agrega la mezcla.',
                    'Adereza con aceite de oliva y vinagre.',
                ],
                'shopping_list' => [
                    'Atún',
                    'Tomate',
                    'Pepino',
                    'Lechuga',
                    'Aceite de oliva',
                    'Vinagre'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '9',
                'image' => 'https://dannito.ddns.net/menulisto/images/ef0400cb-37ac-473f-9933-70d4e251b272.png',
                'title' => 'Sándwich de Pollo',
                'description' => 'Sándwich de pollo con mayonesa y lechuga.',
                'type' => 'Cena',
                'ingredients' => [
                    '2 Rebanadas de pan',
                    '1 Pechuga de pollo a la parrilla',
                    'Hojas de lechuga',
                    'Mayonesa al gusto',
                ],
                'instructions' => [
                    'Cocina la pechuga de pollo a la parrilla.',
                    'Coloca la pechuga en las rebanadas de pan con lechuga.',
                    'Añade mayonesa al gusto y sirve.',
                ],
                'shopping_list' => [
                    'Pan',
                    'Pechuga de pollo',
                    'Lechuga',
                    'Mayonesa'
                ],
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '10',
                'image' => 'https://dannito.ddns.net/menulisto/images/868bf920-a765-402d-b8e2-9b8bc3e16369.png',
                'title' => 'Pancakes con Miel',
                'description' => 'Deliciosas pancakes con miel y frutas frescas.',
                'type' => 'Desayuno',
                'ingredients' => [
                    '1 Taza de harina',
                    '1 Huevo',
                    '1 Taza de leche',
                    '1 Cucharadita de polvo de hornear',
                    'Frutas frescas (fresas, plátano)',
                    'Miel al gusto',
                ],
                'instructions' => [
                    'Mezcla la harina, el huevo, la leche y el polvo de hornear.',
                    'Cocina las pancakes en una sartén hasta que estén doradas por ambos lados.',
                    'Sirve con frutas frescas y un poco de miel.',
                ],
                'shopping_list' => [
                    'Harina',
                    'Huevo',
                    'Leche',
                    'Polvo de hornear',
                    'Frutas frescas',
                    'Miel'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '11',
                'image' => 'https://dannito.ddns.net/menulisto/images/2e1d9555-222c-4d2b-a54d-af1ac98c6d34.png',
                'title' => 'Ensalada Griega',
                'description' => 'Ensalada con pepino, tomate, cebolla morada, queso feta y aceitunas.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '1 Pepino',
                    '2 Tomates',
                    '1 Cebolla morada',
                    '100g de queso feta',
                    'Aceitunas negras al gusto',
                    'Aceite de oliva y vinagre',
                ],
                'instructions' => [
                    'Corta el pepino, los tomates y la cebolla morada.',
                    'Añade el queso feta desmenuzado y las aceitunas.',
                    'Adereza con aceite de oliva y vinagre.',
                ],
                'shopping_list' => [
                    'Pepino',
                    'Tomates',
                    'Cebolla morada',
                    'Queso feta',
                    'Aceitunas negras',
                    'Aceite de oliva',
                    'Vinagre'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '12',
                'image' => 'https://dannito.ddns.net/menulisto/images/a8754e70-4080-4914-8072-57d6b0c67ff3.png',
                'title' => 'Hamburguesa de Pollo',
                'description' => 'Hamburguesa con pechuga de pollo, lechuga y mayonesa.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '1 Pechuga de pollo',
                    '1 Pan de hamburguesa',
                    'Hojas de lechuga',
                    'Mayonesa al gusto',
                    'Tomate en rodajas',
                ],
                'instructions' => [
                    'Cocina la pechuga de pollo a la parrilla.',
                    'Coloca la pechuga en el pan de hamburguesa con lechuga y tomate.',
                    'Añade mayonesa al gusto y sirve.',
                ],
                'shopping_list' => [
                    'Pechuga de pollo',
                    'Pan de hamburguesa',
                    'Lechuga',
                    'Mayonesa',
                    'Tomate'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '13',
                'image' => 'https://dannito.ddns.net/menulisto/images/f0b77959-ac4b-4bcc-a5a4-aa5b1994019c.png',
                'title' => 'Sopa de Tomate',
                'description' => 'Sopa cremosa de tomate con albahaca fresca.',
                'type' => 'Cena',
                'ingredients' => [
                    '4 Tomates',
                    '1 Cebolla',
                    '2 Dientes de ajo',
                    '1 Taza de caldo de verduras',
                    'Albahaca fresca',
                    'Crema al gusto',
                ],
                'instructions' => [
                    'Sofríe la cebolla y el ajo en una sartén.',
                    'Añade los tomates picados y cocina por 10 minutos.',
                    'Añade el caldo de verduras y cocina por 15 minutos.',
                    'Licúa la sopa, añade crema y albahaca fresca al servir.',
                ],
                'shopping_list' => [
                    'Tomates',
                    'Cebolla',
                    'Ajo',
                    'Caldo de verduras',
                    'Albahaca',
                    'Crema'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '14',
                'image' => 'https://dannito.ddns.net/menulisto/images/3ce6cb98-ebdb-4cb8-a545-c1cfc975dcf0.png',
                'title' => 'Chilaquiles Verdes',
                'description' => 'Chilaquiles en salsa verde con pollo desmenuzado.',
                'type' => 'Desayuno',
                'ingredients' => [
                    '8 Tortillas de maíz',
                    '1 Taza de salsa verde',
                    '1 Pechuga de pollo',
                    'Queso fresco al gusto',
                    'Cebolla morada',
                ],
                'instructions' => [
                    'Corta las tortillas en triángulos y fríelas hasta que estén crujientes.',
                    'Cocina el pollo y desmenúzalo.',
                    'Mezcla las tortillas fritas con la salsa verde y el pollo.',
                    'Sirve con queso fresco y cebolla morada al gusto.',
                ],
                'shopping_list' => [
                    'Tortillas de maíz',
                    'Salsa verde',
                    'Pechuga de pollo',
                    'Queso fresco',
                    'Cebolla morada'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                    'id' => '15',
                    'image' => 'https://dannito.ddns.net/menulisto/images/b384ee39-d3a2-4b0e-ba3b-2505a652bd40.png',
                    'title' => 'Paella de Mariscos',
                    'description' => 'Paella con mariscos, arroz y pimientos.',
                    'type' => 'Almuerzo',
                    'ingredients' => [
                        '200g de arroz',
                        '200g de camarones',
                        '100g de calamares',
                        '1 Pimiento rojo',
                        '1 Taza de caldo de mariscos',
                        'Aceite de oliva',
                    ],
                    'instructions' => [
                        'Sofríe el pimiento picado y los mariscos en una sartén.',
                        'Añade el arroz y el caldo de mariscos.',
                        'Cocina hasta que el arroz esté listo y sirve.',
                    ],
                    'shopping_list' => [
                        'Arroz',
                        'Camarones',
                        'Calamares',
                        'Pimiento rojo',
                        'Caldo de mariscos',
                        'Aceite de oliva'
                    ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '16',
                'image' => 'https://dannito.ddns.net/menulisto/images/b384ee39-d3a2-4b0e-ba3b-2505a652bd40.png',
                'title' => 'Tortilla Española',
                'description' => 'Tortilla española con patatas y cebolla.',
                'type' => 'Cena',
                'ingredients' => [
                    '4 Huevos',
                    '2 Papas medianas',
                    '1 Cebolla',
                    'Aceite de oliva',
                    'Sal y pimienta al gusto',
                ],
                'instructions' => [
                    'Pela y corta las papas en rodajas finas.',
                    'Sofríe las papas y la cebolla en aceite de oliva.',
                    'Bate los huevos, mézclalos con las papas y cocina hasta que esté lista.',
                ],
                'shopping_list' => [
                    'Huevos',
                    'Papas',
                    'Cebolla',
                    'Aceite de oliva',
                    'Sal y pimienta'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '17',
                'image' => 'https://dannito.ddns.net/menulisto/images/0cccb5f2-6450-437c-97cd-dfe64f4f78ae.png',
                'title' => 'Arroz con pollo',
                'description' => 'Arroz con pollo y vegetales.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    '2 Pechugas de pollo',
                    '1 Taza de arroz',
                    '1 Zanahoria',
                    '1 Taza de guisantes',
                    '1 Pimiento',
                    'Caldo de pollo',
                ],
                'instructions' => [
                    'Cocina las pechugas de pollo y desmenúzalas.',
                    'Sofríe las zanahorias, pimientos y guisantes.',
                    'Añade el arroz y el caldo de pollo, cocina hasta que el arroz esté listo.',
                    'Mezcla con el pollo desmenuzado y sirve.',
                ],
                'shopping_list' => [
                    'Pechugas de pollo',
                    'Arroz',
                    'Zanahoria',
                    'Guisantes',
                    'Pimiento',
                    'Caldo de pollo'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '18',
                'image' => 'https://dannito.ddns.net/menulisto/images/15908ead-9b13-447d-8574-8727648583a5.png',
                'title' => 'Sushi de Atún',
                'description' => 'Sushi con atún fresco, aguacate y arroz.',
                'type' => 'Cena',
                'ingredients' => [
                    '200g de arroz para sushi',
                    '1 Aguacate',
                    '200g de atún fresco',
                    'Alga nori',
                    'Salsa de soja',
                ],
                'instructions' => [
                    'Cocina el arroz para sushi y deja enfriar.',
                    'Corta el atún y el aguacate en tiras.',
                    'Coloca el arroz sobre las algas nori y agrega el atún y aguacate.',
                    'Enrolla y sirve con salsa de soja.',
                ],
                'shopping_list' => [
                    'Arroz para sushi',
                    'Aguacate',
                    'Atún fresco',
                    'Alga nori',
                    'Salsa de soja'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '19',
                'image' => 'https://dannito.ddns.net/menulisto/images/c8809181-fd22-4132-b089-662da8c384ae.png',
                'title' => 'Arepas',
                'description' => 'Arepas rellenas con queso y acompañadas de carne o pollo.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    'Masa de maíz',
                    'Queso rallado',
                    'Carne o pollo desmechado',
                    'Aceite para freír',
                ],
                'instructions' => [
                    'Prepara la masa de maíz según las instrucciones.',
                    'Forma pequeñas arepas y cocínelas en una sartén.',
                    'Agrega el queso y la carne o pollo en el centro de las arepas.',
                    'Sírvelas calientes.',
                ],
                'shopping_list' => [
                    'Masa de maíz',
                    'Queso rallado',
                    'Carne o pollo',
                    'Aceite'
                ]
            ])
        ]);

        Menu::create([
            'menu' => json_encode([
                'id' => '20',
                'image' => 'https://dannito.ddns.net/menulisto/images/366379f9-207c-4758-b822-b475219e3d94.png',
                'title' => 'Bandeja Paisa',
                'description' => 'Un plato típico colombiano con arroz, frijoles, carne molida, chicharrón, huevo frito, aguacate y arepa.',
                'type' => 'Almuerzo',
                'ingredients' => [
                    'Arroz',
                    'Frijoles rojos',
                    'Carne molida',
                    'Chicharrón',
                    'Huevo frito',
                    'Aguacate',
                    'Arepa',
                    'Plátano maduro',
                ],
                'instructions' => [
                    'Cocina el arroz y los frijoles por separado.',
                    'Fría el chicharrón hasta que esté crujiente.',
                    'Fría un huevo para acompañar el plato.',
                    'Sirve todo en una bandeja, agregando el arroz, frijoles, carne molida, chicharrón, huevo frito, aguacate y arepa.',
                    'Acompáñalo con plátano maduro frito.',
                ],
                'shopping_list' => [
                    'Arroz',
                    'Frijoles rojos',
                    'Carne molida',
                    'Chicharrón',
                    'Huevo',
                    'Aguacate',
                    'Arepa',
                    'Plátano maduro',
                ]
            ])
        ]);
            
    }
    
}
