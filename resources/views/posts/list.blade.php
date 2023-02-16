@section('plugins.Summernote', true)

@extends('adminlte::page')

@section('title', 'Intranet')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Artigos</h1>
        <a class="btn btn-primary" href="{{ url('posts/create') }}">Novo Artigo</a>
    </div>
@stop

@section('content')
    <table class="table">
        <thead>
            <th>Título</th>
            <th>Teste</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>
                    <form action="{{ url('posts/' . $post->id) }}" method="post">
                        @csrf
                        {{-- <input type="hidden" name="postID" value="{{ $post->id }}"> --}}
                        <button type="submit" class="btn btn-primary float-right">Acessar</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
