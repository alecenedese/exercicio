{{-- herda a view base --}}
@extends('base')
{{-- define o conteúdo --}}
@section('content')
    {{-- caso exista a variável msg, exibe uma mensagem --}}
    @if (isset($msg))
        <h3 style="color: red">Contato não encontrado!</h3>
    @else
    {{-- senão, mostra os daddos --}}
        <h2>Mostrando dados do Contato</h2>
        <p><strong>Nome:</strong> {{ $contacts->name }} </p>
        <p><strong>E-mail:</strong> {{ $contacts->email }} </p>
        <p><strong>Contato:</strong> {{ $contacts->contato }} </p>
        <a href="{{ route('contacts.index') }}">Voltar</a>
    @endif
@endsection