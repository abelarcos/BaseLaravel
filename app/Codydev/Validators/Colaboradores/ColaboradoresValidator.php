<?php

namespace Codydev\Validators\Colaboradores;
use Codydev\Abstracts\AValidator;


class ColaboradoresValidator extends AValidator implements IColaboradoresValidator{

    protected $messages = [

        'nombre.required' => 'El campo nombre es requerido',
        'especialidad.required' => 'El campo especialidad es requerido',
        'foto.image' => 'El archivo debe ser una foto',
        'foto.mimes' => 'El archivo debe de ser una de las siguientes extensiones: .jpeg|.png|.jpg',
        'foto.max' => 'La foto debe ser de un maximo de 3M Megabytes',
        'twitter.url' => 'El Campo twitter debe ser una url valida',
        'github.url' => 'El Campo github debe ser una url valida',
        'linkedin.url' => 'El Campo linkedin debe ser una url valida',
        'correo_electronico.required' => 'El campo correo es requerido',
        'correo_electronico.email' => 'El campo correo electronico debe ser un email valido',
        'descripcion.required' => 'El campo descripcion es requerido'

    ];

    protected $rules = [

        'create' => [

            'nombre' => 'required|string|max:250',
            'especialidad' => 'required|string|max:250',
            'foto' => 'nullable|image|max:3072|mimes:jpeg,png,jpg',
            'twitter' => 'nullable|url',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'correo_electronico' => 'required|email|unique:colaboradores',
            'descripcion' => 'required|string'


        ],

        'update' => [

            'nombre' => 'required|string',
            'especialidad' => 'required|string',
            'foto' => 'nullable|image|max:3072|mimes:jpeg,png,jpg',
            'twitter' => 'nullable|url',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'correo_electronico' => 'required|email',
            'descripcion' => 'required|string'

        ]

    ];
}