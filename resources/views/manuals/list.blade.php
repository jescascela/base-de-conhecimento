@section('plugins.Summernote', true)

@extends('adminlte::page')

@section('title', 'Intranet')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Manuais</h1>
        <a class="btn btn-primary" href="{{ url('manuals/create') }}">Novo Manual</a>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table">
            <tbody>
                @foreach ($manuals as $manual)
                    <tr>
                        <td>{{ basename($manual) }}</td>
                        <td>
                            <a href="{{ url('download/' . basename($manual)) }}">Download</a>
                        </td>
                        <td>
                            <form action="{{url('manuals/' . basename($manual))}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
