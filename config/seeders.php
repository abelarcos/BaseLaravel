<?php

/**El arreglo esta organizado por ambientes y los seeders se cargan  siempre que esten en true */

return [

    'production' => [
        
        // ['name' => ThemesTableSeeder::class, 'callable' => false],
        // ['name' => LanguageTableSeeder::class, 'callable' => false],
        // ['name' => PlaceTableSeeder::class, 'class' => false  ],
    ],

    'local' => [

        ['name' => UsersTableSeeder::class, 'callable' => true],
        ['name' => SkillsTableSeeder::class, 'callable' => true],
        ['name' => AgendasTableSeeder::class, 'callable' => true],
        ['name' => ColaboradorTableSeeder::class, 'callable' => true],
        ['name' => EntrenadoresTableSeeder::class, 'callable' => true],


    ]

];