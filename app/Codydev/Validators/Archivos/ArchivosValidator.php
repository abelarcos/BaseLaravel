<?php

namespace Codydev\Validators\Archivos;
use Codydev\Abstracts\AValidator;

class ArchivosValidator extends AValidator implements IArchivosValidator{

    protected $messages = [

        'file.image' => 'El archivo debe ser una foto',
        'file.mimes' => 'El archivo debe de ser una de las siguientes extensiones: .jpeg|.png|.jpg',
        'file.max' => 'La foto debe ser de un maximo de 3M Megabytes',
    ];

    protected $rules = [

        'created' => [

            'file' => 'nullable|image|max:3072|mimes:jpeg,png,jpg',


        ],

        'updated' => [

        ]

    ];
}