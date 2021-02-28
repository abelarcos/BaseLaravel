@extends('layouts.admin')

@section('titulo', 'Entrenadores')

@push('estilos')
    <link rel="stylesheet" href="{{ asset('asset/styles/main_styles.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/styles/responsive.css')}}">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{--route('admin')--}}">@yield('titulo')</a></li>
@endsection

    

@section('contenido')
    
    <entrenadores-component></entrenadores-component>
    
   
@endsection



@push('scripts')

   <!-- jQuery -->
   <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}} "></script>
   <!-- Bootstrap 4 -->
   <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Vuejs -->
   <script src="{{ asset('js/app.js')}}"></script>
  

@endpush



