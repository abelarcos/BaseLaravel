@extends('layouts.admin')

@section('titulo', 'Codydev')

@push('estilos')
    <link rel="stylesheet" href="{{ asset('asset/styles/main_styles.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/styles/responsive.css')}}">
    
@endpush

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-8 container">
            <div class="card card-teal">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fas fa-edit "></i>  Editar Colaborador </h3>
                </div>

               
            <form class="form-horizontal" action="{{ route('colaboradores.editar', $colaborador->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ old('nombre', $colaborador->nombre)}}" name="nombre" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Especialidad</label>
                        <div class="col-sm-10">
                            <input value="{{ old('especialidad', $colaborador->especialidad)}}" name="especialidad" type="text" class="form-control" id="inputPassword3" placeholder="Especialidad">
                        </div>
                      </div>

          
                      <div class="form-group row">
                        <label for="foto" class="col-form-label col-md-4">{{'Foto'}}</label>
                        <br>

                        <img src="{{ asset($colaborador->foto) }} " alt="" with="200" height="100">

                        <div class="col-md-8">
                            <input type="file" name="foto" id="foto"/>
                        </div>
                        <br>

                      </div>

                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                        <input type="url" value="{{ old('twiter', $colaborador->twitter)}}" name="twitter" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">GitHub</label>
                        <div class="col-sm-10">
                          <input type="url" value="{{old('github', $colaborador->github)}}" name="github" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Linkedin</label>
                        <div class="col-sm-10">
                        <input type="url" value="{{ old('linkedin', $colaborador->linkedin)}}" name="linkedin" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                        <input type="email" value="{{old('correo_electronico', $colaborador->correo_electronico)}}" name="correo_electronico" class="form-control" id="inputPassword3" placeholder="Correo">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ old('descripcion', $colaborador->descripcion)}}" name="descripcion" class="form-control" id="inputPassword3" placeholder="Descripcion">
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
    <script src="{{asset('adminlte/plugins/dropify/dropify.js')}}"></script>
    <script src="{{asset('adminlte/plugins/dropify/dropify.min.js')}}"></script>
    <script>

        $(function () {
            $('#form-editar').validate({
                rules: {
                    nombre: { required: true },
                    especialidad: { required: true},
                    correo_electronico: { required: true}
                }

            })
        })

    </script>
@endpush