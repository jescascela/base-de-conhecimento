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
    <table class="table">
        <tbody>
            @forelse ($manuals as $manual)
                <tr>
                    <td>{{ basename($manual) }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('download/' . basename($manual)) }}" class="btn btn-primary mr-2"
                                role="button">Download</a>
                            {{-- <form action="{{ url('manuals/' . basename($manual)) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form> --}}
                            <button class="btn btn-danger" type="submit" data-toggle="modal"
                                data-target="#exampleModal" data-manual-name="{{ basename($manual)}}">Excluir</button>
                        </div>
                    </td>
                </tr>
                @empty
                <p>Não há manuais cadastrados</p>
            @endforelse
        </tbody>
    </table>
    @if(isset($manual))
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {{-- <button type="button" class="btn btn-danger">Excluir</button> --}}
                    <form id="formID" action="{{ url('manuals/' . basename($manual)) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop


@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('manual-name') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body p').append(" <b>" + recipient + "</b>?")

            $('#formID').attr('action', 'manuals/' + recipient)
        })
    </script>
@stop
