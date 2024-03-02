{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Contatos Cadastrados</h2>
    {{-- se a variável $contacts não existir, mostra um h3 com uma mensagem --}}
    @if (!isset($contacts))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>email</th>
                    <th>Contato</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                {{-- itera sobre a coleção de veículos --}}
                @foreach ($contacts as $v)
                    <tr>
                        <td>{{ $v->name }} </td>
                        <td> {{ $v->email }} </td>
                        <td> {{ $v->contato }} </td>
                        {{-- vai para a rota show, passando o id como parâmetro --}}
                        <td> <a href="{{ route('contacts.show', $v->id) }}">Exibir</a> </td>
                        <td> <a href="{{ route('contacts.edit', $v->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    {{-- mostra a qtde de veículos cadastrados. --}}
                    <td colspan="5">Contatos Cadastrados: {{ $contacts->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection