@extends('layouts.master')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <div class="mb-1">
                    <a class="button" href="{{route('create')}}">Criar novo</a>
                </div>
                <div>
                    @if(Session::has('flash-success'))
                        <p>{{Session::get('flash-success')}}</p>
                    @endif
                </div>
                <table>
                    <thead>
                        <tr>
                            <th class="p-1">ID</th>
                            <th class="p-1">Data de Cadastro</th>
                            <th class="p-1">Nome</th>
                            <th class="p-1">Usuário</th>
                            <th class="p-1">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $item)

                            <tr>
                                <td class="p-1">{{$item->id}}</td>
                                <td class="p-1">{{$item->created_at->format('d/m/Y H:i:s')}}</td>
                                <td class="p-1">{{$item->name}}</td>
                                <td class="p-1">{{$item->user_name}}</td>
                                <td class="p-1">{{$item->email}}</td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5">
                                    Nenhum cadastro encontrado
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{$customers->links()}}
                </div>
            </div>
        </div>

    </div>

</div>

@stop