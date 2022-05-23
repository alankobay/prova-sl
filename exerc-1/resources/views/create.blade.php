@extends('layouts.master')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                @if(isset($errors) && filled($errors))
                    <div style="color: red;">
                        <p><b>Erros encontrados!</b></p>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('create')}}">
                    {{csrf_field()}}
                    <div class="mb-1">
                        <label for="name" class="d-block">Nome completo:</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}">
                    </div>
                    <div class="mb-1">
                        <label for="userName" class="d-block">Nome de login:</label>
                        <input type="text" id="userName" name="userName" value="{{old('userName')}}">
                    </div>
                    <div class="mb-1">
                        <label for="zipCode" class="d-block">CEP</label>
                        <input type="text" id="zipCode" name="zipCode" value="{{old('zipCode')}}">
                    </div class="mb-1">
                    <div class="mb-1">
                        <label for="email" class="d-block">Email:</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-1">
                        <label for="password" class="d-block">Senha (8 caracteres mínimo, contendo pelo menos 1 letra
                            e 1 número):</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="mb-1">
                        <label for="password_confirmation" class="d-block">Confime a Senha:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                    <input type="submit" value="Cadastrar" class="button">
                </form>
            </div>
        </div>

    </div>

</div>

@stop