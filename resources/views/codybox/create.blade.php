@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Subir Archivo</h3>
      </div>
    </div>

   
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6 ">
          <strong>Archivo :</strong>
          <input type="file" name="file" class="form-control">
         
        </div>

        <div class="col-md-6">
          <strong>Categoria :</strong>
          <select name="category" id="" class="form-control">
            <option class="form-control" value="" disabled selected>selecciona una categoria</option>
            <option value="1">Documentos</option>
            <option value="2">Archivos</option>
            <option value="3">Imagenes</option>
          </select>

        </div>
       </div>
      
        <div class="col-md-6 mt-2">
          <a href="{{ route('file.index') }}" class="btn btn-sm btn-success">Volver</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection







