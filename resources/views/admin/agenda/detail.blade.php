@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle Usuario</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{ $user->name }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Correo : </strong> {{ $user->email}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Especialidad : </strong> {{ $user->especialidad}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-success">Volver</a>
      </div>
    </div>
  </div>
@endsection
