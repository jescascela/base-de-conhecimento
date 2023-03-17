@extends('adminlte::page')

@section('title', 'Intranet')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $posts }}</h3>
                    <p>Artigos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col-sm">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $files }}</h3>
                    <p>Manuais</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col-sm">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>Projetos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
