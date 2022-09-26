@extends('layou')

@section('title','Корзина')

@section('content')
    <div class="container">
        @if(session('basket'))
            <table class="table table-striped">
                <thead >
                    <tr>
                        <td>Код</td>
                        <td>Наименование</td>
                        <td>Изображение</td>
                        <td>Цена(1шт.)</td>
                        <td colspan="3">Кол-во</td>
                        <td>Статус</td>
                        <td>Стоимость(общая)</td>
                        <td>Удаление</td>
                    </tr>
                </thead>
                <tbody>
                    @php $sum=0 @endphp
                    @foreach(session('basket') as $id=>$item)
                        <tr>
                            <td>{{$item['product_id']}}</td>
                            <td>{{$item['nameProduct']}}</td>
                            <td>
{{--                                {{dd(public_path().'/images/'.$item['nameCategory'].'/'.$item['image'])}}--}}
                                <img
                                        alt="{{$item['nameProduct']}}"
                                        src="/images/{{$item['nameCategory']}}/{{$item['image']}}"
                                        style="max-width: 100px"
                                >
                            </td>
                            <td>{{number_format($item['price'],2,',',' ')}} руб.</td>
                            <td>
                                <form
                                        action="{{route('Plusbasket',['id'=>$item['product_id']])}}"
                                        method="post"
                                >
                                    @csrf
                                    @method('PUT')
                                    <button
                                            type="submit"
                                            class="btn btn-primary"
                                            {{$item['countBasket'] > $item['KolProduct']?'disabled':''}}
                                            value="{{$item['product_id']}}"
                                    >
                                        +
                                    </button>
                                </form>
                            </td>
                            <td>
                                {{$item['countBasket']}}
                            </td>
                            <td>
                                <form
                                        action="{{route('Minusbasket',['id'=>$item['product_id']])}}"
                                        method="post"
                                >
                                    @csrf
                                    @method('PATCH')
                                    <button
                                            type="submit"
                                            class="btn btn-primary"
                                            {{$item['countBasket'] <= 1?'disabled':''}}
                                            value="{{$item['product_id']}}"
                                    >
                                        -
                                    </button>
                                </form>
                            </td>
                            <td>
                                @if($item['countBasket'] > $item['KolProduct'])
                                    <p class="text-reset">товара в таком кол-ве нет</p>
                                @else
                                    <p style="color: green">
                                        Удачной покупки
                                    </p>
                                @endif
                            </td>
                            <td>
                                {{number_format($item['countBasket']*$item['price'],2,',',' ')}}
                            </td>
                            <td>
                                <form
                                        action="{{route('Deletedbasket')}}"
                                        method="post"
                                >
                                    @csrf
                                    @method('delete')
                                    <button
                                            name="product_id"
                                            type="submit"
                                            class="btn btn-primary"
                                            value="{{$item['product_id']}}"
                                    >
                                        X
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php
                          $sum += $item['countBasket']*$item['price']
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <h4>
                Итого:
                <b>
                    @php
                        echo number_format($sum,2,',',' ').'руб.'
                    @endphp
                </b>
            </h4>
            <hr style="margin-top: 100px">
{{--        {{dd(session('countOrder'))}}--}}
            <div class="row">
                <div class="col-8 mx-auto text-center" style="{{session('countOrder')==0?'display:none':'display:block'}}">
                    <h4 class="">
                        Для оформления заказа, введите пароль и нажмите кнопку
                    </h4>
                    <div class="">
                        <form
                            action="{{route('OrderProduct')}}"
                            method="post"
                        >
                            @csrf
                            @method('POST')
                            <div class="form-control text-center mx-auto">
                                @if(session('success'))
                                    <h1>{{session('success')}}</h1>
                                @endif
                                <div class="d-flex justify-content-center ">
                                    <label for="password" class="p-4">
                                        Введите пароль
                                    </label>
                                    <input
                                            value="{{old('password')}}"
                                            type="password"
                                            id="password"
                                            name="password"
                                            required
                                            class="m-4"
                                    >
                                </div>
                                <button
                                        type="submit"
                                        class="btn-primary btn w-100"
                                >
                                    Оформить заказ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection