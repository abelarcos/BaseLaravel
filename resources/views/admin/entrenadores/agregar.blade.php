@extends('layouts.admin')

@section('titulo', 'Entrenadores')

@push('estilos')

@endpush

@section('contenido')

    
    <div class="container">
        <div class="row">
            <div class="col-md-8 container">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-user"></i>  Agregar Colaborador </h3>
                    </div>

                   
                <form class="form-horizontal" action="{{ route('colaboradores.agregar')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" name="nombre" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Especialidad</label>
                            <div class="col-sm-10">
                              <input name="especialidad" type="text" class="form-control" id="inputPassword3" placeholder="Especialidad">
                            </div>
                          </div>

              
                          <div class="form-group row">
                            <label for="exampleInputFile" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-sm-10">
                             
                              <input type="file" class="form-control" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Cargar Foto</label>
                           
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                              <input type="url" name="twitter" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">GitHub</label>
                            <div class="col-sm-10">
                              <input type="url" name="github" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Linkedin</label>
                            <div class="col-sm-10">
                              <input type="url" name="linkedin" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                              <input type="email" name="correo_electronico" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion</label>
                            <div class="col-sm-10">
                              <input type="text" name="descripcion" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>
                          
                         
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-info"> Guardar &nbsp; <i class="fas fa-save bg-info"></i></button>
                        <a href="{{ route('colaboradores.index')}}"><button type="button" class="btn btn-secondary">Cancelar &nbsp; <i class="fas fa-times"></i></button></a>
                        </div>
                        <!-- /.card-footer -->
                      </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')

@endpush



