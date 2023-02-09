@section('plugins.Summernote', true)

@extends('adminlte::page')

@section('title', 'Intranet')

@section('content_header')
    <h1>Artigos</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('post-update', ['post' => $post->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" @error('title') is-invalid @enderror">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="description" id="summernote">{{ $post->description }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right">Salvar</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@stop
