@extends('layouts.admin')

@section('titulo', 'CodyDev')

@push('estilos')

@endpush


@section('breadcrum')
  <li class="breadcrumb-item"><a href="{{--route('admin')--}}">@yield('titulo')</a></li>
@endsection

@section('contenido')
    
<div class="container">
  <div class="row">
      <div class="col-md-8 container">
          <div class="card card-teal">
              <div class="card-header">
                  <h3 class="card-title"> <i class="fas fa-user"></i>  Agregar Registro </h3>
              </div>

             
          <form class="form-horizontal" action="{{ route('agenda.agregar')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" name="nombres" class="form-control" id="inputEmail3" placeholder="Nombre">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Apellidos</label>
                      <div class="col-sm-10">
                        <input name="apellidos" type="text" class="form-control" id="inputPassword3" placeholder="Apellidos">
                      </div>
                    </div>

      
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono</label>
                      <div class="col-sm-10">
                        <input type="text" name="telefono" class="form-control" id="inputPassword3" placeholder="Telefono">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Celular</label>
                      <div class="col-sm-10">
                        <input type="text" name="celular" class="form-control" id="inputPassword3" placeholder="Celular">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Sexo</label>
                      <div class="col-sm-10">
                        <input type="text" name="sexo" class="form-control" id="inputPassword3" placeholder="Sexo">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Correo</label>
                      <div class="col-sm-10">
                        <input type="email" name="correo" class="form-control" id="inputPassword3" placeholder="Correo">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Posicion</label>
                      <div class="col-sm-10">
                        <input type="text" name="posicion" class="form-control" id="inputPassword3" placeholder="Posicion">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Departamento</label>
                      <div class="col-sm-10">
                        <input type="text" name="departamento" class="form-control" id="inputPassword3" placeholder="Departamento">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Salario</label>
                      <div class="col-sm-10">
                        <input type="number" name="salario" class="form-control" id="inputPassword3" placeholder="Salario">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha Nacimiento</label>
                      <div class="col-sm-10">
                        <input type="date" name="fecha" class="form-control" id="inputPassword3" >
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