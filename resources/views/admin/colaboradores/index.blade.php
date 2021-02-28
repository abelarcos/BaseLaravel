@extends('layouts.admin')

@section('titulo', 'CodyDev')


@push('estilos')

  
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{--route('admin')--}}">@yield('titulo')</a></li>
@endsection

@section('contenido')
    

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-teal">
              <h3 class="card-title"><i class="fas fa-users"></i>  Colaboradores</h3>
             <a href="{{route('colaboradores.agregar')}}" class="btn btn-default float-right p-1" style="width: 150px;" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i>Agregar</a>

              
              <div class="input-group input-group-sm float-right mr-4" style="width: 200px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Twitter</th>
                    <th>Github</th>
                    <th>Linkedin</th>
                    <th>Correo</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($colaboradores as $colaborador)
                    <tr>
                        <td>
                          <img src="{{ asset($colaborador->foto)}}" class="img-thumbnail img-fluid" alt="" width="100">
                        </td>
                        <td>{{$colaborador->nombre}}</td>
                        <td>{{$colaborador->especialidad}}</td>
                        @if($colaborador->twitter)
                           <td><span class="badge badge-info badge-pill">Si</span></td>
                        @else
                            <td><span class="badge badge-info badge-pill">No</span></td>
                        @endif
                        @if($colaborador->github)
                            <td><span class="badge badge-secondary badge-pill">Si</span></td>
                        @else
                             <td><span class="badge badge-secondary badge-pill">No</span></td>
                        @endif
                        @if($colaborador->linkedin)
                            <td><span class="badge badge-primary badge-pill">Si</span></td>
                        @else
                            <td><span class="badge badge-primary badge-pill">No</span></td>
                        @endif
                        <td>{{$colaborador->correo_electronico}}</td>
                        <td>{{$colaborador->descripcion}}</td>
                        <td>
                          <a class="btn btn-success btn-xs" href="{{ route('colaboradores.ver', $colaborador->id)}}">Ver</a>
                          <a class="btn btn-warning btn-xs" href="{{ route('colaboradores.editar', $colaborador->id) }}" >Editar</a>

                          <form action="{{ route('colaboradores.eliminar', $colaborador->id)}}" method="POST" style="display:inline" >
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('¿Estas Seguro de eliminar el Registro?');">Eliminar</button>
                          </form>
                        </td>
                    </tr>

                  @empty
                    <h4 class="text-muted">No Hay Registros</h4>
                  @endforelse
                </tbody>
              </table>
              @include('admin.colaboradores.partial.modalagregar')
              @include('admin.colaboradores.partial.modaleditar')

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
                {{ $colaboradores->links() }}
                
              </ul>
              
            </div>
          </div>
          <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
 
  <!-- /.content -->
    
@endsection

@push('scripts')

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}} "></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
@endpush


