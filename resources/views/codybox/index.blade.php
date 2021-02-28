@extends('layouts.app')
@section('meta-title','index')
@section('meta-description', 'Agenda Telefonica')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>CodyBox | Lista Archivos</h3>
      </div>

    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
   
     
    
    <nav class="navbar navbar-light float-right">
      <a class="btn btn-sm btn-success p-2 mr-2" href="{{ route('file.create') }}">Subir Archivo</a>
      <form action="{{ route('users.search')}}" method="GET" class="form-inline my-2 my-lg-0">
        
        <select class="form-control mr-2" name="tipo" >
          <option value="">Buscar Por Tipo</option>
          <option value="">nombres</option>
          <option value="">apellidos</option>
          <option value="">telefono</option>
          <option value="">email</option>
        </select>
        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
      
    </nav>


    {{-- <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th >Nombre Completo</th>
        
        <th>Telefono</th>
        
        <th>Sexo</th>
        <th>Correo</th>

        <th>Salario</th>
        <th>FechaNacimiento</th>
        
        <th width = "180px">Accion</th>
      </tr>

      @foreach ($usuarios as $usuario)
        <tr>
          <td><b>{{$usuario->id}}.</b></td>
          <td>{{$usuario->nombres}}</td>
          
          <td>{{$usuario->telefono}}</td>
         
          <td>{{$usuario->sexo}}</td>
          <td>{{$usuario->email}}</td>
  
          <td>{{$usuario->salario}}</td>
          <td>{{$usuario->fechadenacimiento}}</td>
          
          <td>
            <form action="{{ route('users.delete', $usuario) }}" method="POST">
              @csrf
              <a class="btn btn-sm btn-success" href="{{ route('users.show', $usuario) }}">ver</a>
              <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $usuario) }}">Editar</a>
              
              @method('DELETE')
              <button onclick="return confirm('Estas Seguro de eliminar el Usuario?')" type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table> --}}

{{-- {!! $usuarios->links() !!} --}}
  </div>
@endsection

