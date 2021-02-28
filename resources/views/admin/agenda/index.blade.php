@extends('layouts.admin')

@section('titulo', 'CodyDev')

@push('estilos')

  <!--sweetalert2-->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css')}}">

@endpush

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{--route('admin')--}}">@yield('titulo')</a></li>
@endsection

@section('contenido')

  <agenda-component></agenda-component>

@endsection


@push('scripts')

  
  <!--Vuejs -->
  <script src=" {{ asset('js/app.js') }}"></script>
  <!--sweetalert2-->
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
  <!--jquery-->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
  <!-- bootstrap-->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!--Toastr -->
  <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
  
@endpush
