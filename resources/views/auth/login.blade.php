@extends('layou')

@section('title','Авторизация')

@section('content')
    <div class="container">
        <div>
            @if($errors->any())
                <div class="alert alert-danger bg-danger ">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div >
            <form class="d-grid justify-content-center" action="{{route('login')}}" method="POST">
                @csrf
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="email">
                        Логин
                    </label>
                    <input
                            type="email"
                            id="email"
                            name="email"
                            class="input-group-text text-start"
                            value="{{old('email')}}"
                            autocomplete="email"
                    >
                </div>
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="password">
                        Пароль
                    </label>
                    <input
                            type="password"
                            id="password"
                            name="password"
                            class="input-group-text text-start"
                    >
                </div>
                <div  class="text-center ">
                    <button class="btn btn-primary ">
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection