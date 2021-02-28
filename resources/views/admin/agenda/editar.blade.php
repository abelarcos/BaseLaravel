@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar Usuario</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(session('status'))
      <div class="alert alert-success">
          {!! session('status') !!}
      </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
      
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-10">
          <strong>Nombre :</strong>
          <input type="text" name="nombres" class="form-control" value="{{old('nombres', $user->nombres) }}">
        </div>
        <div class="col-md-10">
          <strong>Correo :</strong>
          <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>
        <div class="col-md-10">
          <strong>Especialidad :</strong>
          <textarea class="form-control" name="posicion" rows="8" cols="80">{{ old('posicion', $user->posicion) }}</textarea>
        </div>

        <div class="col-md-10">
          <a href="{{ route('users.index') }}" class="btn btn-sm btn-success">Volver</a>
          <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
