@section('plugins.Summernote', true)

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Artigo</h1>
@stop

@section('content')
    <h2>{{ $post->title }}</h2>
    <div>{!! $post->description !!}</div>
    <a href="{{ url('posts/' . $post->id . '/edit') }}">editar</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop