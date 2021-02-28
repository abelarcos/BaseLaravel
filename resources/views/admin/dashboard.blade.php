
@extends('layouts.admin')

@section('titulo', 'Dashboard')

@push('estilos')


  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

@endpush

@section('contenido')

<div class="row">
  
  @php
    $__elementos = config('menu.elementos');
    $__current = Route::currentRouteName();//nombre de la ruta 
    $__toDisplay = 4;
    $__rendered = 0;
    $__next = 0;
  @endphp
    <!-- small card -->
    
      
    @foreach($__elementos as $__index =>  $__elemento)
      @if($__rendered > ($__toDisplay - 1) )
        @break
      @endif
      
      @if($__elemento['grupo_ruta'])
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-teal">
            <div class="inner">
            <h4>{{ $__elemento['titulo']() }}</h4>
      
            <p>{{ $__elemento['descripcion']() }}</p>
            </div>
            <div class="icon">
              <i class="{{ $__elemento['icon']}}"></i>
            </div>
          <a href="{{ route($__elemento['grupo_ruta']) }}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        @php
          $__rendered++;
        @endphp
      @endif
      @php
        $__next++;
      @endphp

    @endforeach
  </div>
  <!-- ./col -->
  
  <!-- ./col -->
  {{-- <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>0</h3>

        <p>Colaboradores del sistema</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-plus "></i>
      </div>
      <a href="#" class="small-box-footer">
        Ver Info  <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div> --}}
  <!-- ./col -->
  {{-- <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>65</h3>

        <p>Reportes</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-pie"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div> --}}
  <!-- ./col -->
</div>
<!-- /.row -->

@endsection

@push('scripts')
  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script src="{{ asset('js/app_admin.js') }}" defer></script>

@endpush

