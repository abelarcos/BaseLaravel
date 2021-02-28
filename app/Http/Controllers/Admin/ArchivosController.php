<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Codydev\Models\File;
use Codydev\Services\ArchivosService;
use Codydev\Repositories\Archivos\{ArchivoRepository, IArchivoRepository};
use App\Http\Requests\FileRequest;

use Illuminate\Routing\Controller as BaseController;

class ArchivosController extends BaseController {
    
    protected $repository;
    protected $service;

    public function __construct(IArchivoRepository $repository, ArchivosService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getIndex(){
        return view('codybox.create');
    }


}
