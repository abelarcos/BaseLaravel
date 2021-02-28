<?php

return [

    'elementos' => [

        [
            'titulo' => function() {return 'Colaboradores';},
            'grupo_ruta' => 'colaboradores.index',
            'icon' => 'fas fa-users',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => function() {return 'Colaboradores del Sistema';},
            // 'submenu' => [
            //     [
            //         'ruta' => 'usuarios.index',
            //         'label' => function() {return _i('Lista de usuarios');},
            //         'icon' => 'fa fa-anchor'
            //     ],
            //     [
            //         'ruta' => 'usuarios.agregar',
            //         'label' => function() {return _i('Agregar usuario');},
            //         'icon' => 'fa fa-anchor'
            //     ]
            // ]
        ],

        [
            'titulo' => function() {return 'Agenda';},
            'grupo_ruta' => 'agenda.index',
            'icon' => 'fas fa-user',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => function() {return 'Registro de agendas';},
        ],

        [
            'titulo' => function() {return 'Archivos';},
            'grupo_ruta' => 'agenda.index',
            'icon' => 'fas fa-user',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => function() {return 'Control de archivos y documentos';},
        ],

        [
            'titulo' => function() {return 'Pokemones';},
            'grupo_ruta' => 'agenda.index',
            'icon' => 'fas fa-user',
            'is_link' => false,
            'item_in_submenu' => true,
            'descripcion' => function() {return 'Pokemones y Entrenadores';},
         ]

       
        
    ],
];