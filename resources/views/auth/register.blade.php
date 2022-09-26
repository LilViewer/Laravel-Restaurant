@extends('layou')

@section('title','Регистрация')

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
            <form class="d-grid justify-content-center" action="{{route('register')}}" method="POST">
                @csrf
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="name">
                        Имя
                    </label>
                    <input
                            type="text"
                            minlength="2"
                            pattern="^[А-Яа-яЁё\s]+$"
                            id="name"
                            name="name"
                            class="input-group-text text-start "
                            value="{{old('name')}}"
                            autocomplete="name"
                    >
                </div>
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="phone">
                        Телефон
                    </label>
                    <input
                            type="tel"
                            maxlength="12"
                            pattern="+[0-9]{3}-[0-9]{3}-[0-9]{3}"
                            id="phone"
                            name="phone"
                            class="input-group-text text-start"
                            value="+{{old('phone')}}"
                            autocomplete="phone"
                    >
                </div>
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="email">
                        Электронная почта
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
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="passwordRep">
                        повторите пароль
                    </label>
                    <input
                            type="password"
                            id="passwordRep"
                            name="passwordRep"
                            class="input-group-text text-start"
                    >
                </div>
                <div class="d-flex container-fluid align-items-center mb-3" >
                    <label class="text-end w-100 align-middle" style="margin-right: 10px" for="agreement">
                        согласие с правилами регистрации
                    </label>
                    <input
{{--                            checked--}}
                            type="checkbox"
                            id="agreement"
                            name="agreement"
                            class="form-check-input"
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