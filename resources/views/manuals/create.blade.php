@extends('adminlte::page')

@section('title', 'Intranet')

@section('content_header')
    <h1>Tutorial</h1>
@stop

@section('content')
    <form action="{{ url('manuals') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="fileName">Nome do Arquivo</label>
            <input type="text" name="fileName" class="form-control @error('fileName') is-invalid @enderror" id="fileName"
            value="{{ old('fileName') }}" maxlength="255">
            @error('fileName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="file" name="filePDF">
        @error('filePDF')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Enviar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
