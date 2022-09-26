@extends('layou')

@section('title','Главная')

@section('content')
    <div class="col-8 mx-auto text-center" style="margin-bottom: 100px;min-height: 100px">
        <div >
            <h1>О нас</h1>
            <hr>
        </div>
        <div>
            <h3>«Все блюда планеты – только для Вас!!! Добро пожаловать в мир вкусной еды: удовольствие начинается здесь!»</h3>
        </div>
    </div>
    <div class="col-12 min-vw-100 " style="padding: 0px; margin-bottom: 100px">
        <div id="car" class="carousel slide justify-content-center text-center" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#car" class="active" data-bs-slide-to="0"  aria-current="true"/>
                @foreach($categorys as $value=>$item)
                    <button type="button" data-bs-target="#car" data-bs-slide-to="{{$value}}" />
                @endforeach
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    @foreach($category1 as $item)
                        <img
                                src="images/{{$item['image']}}"
                                class="d-block w-100 "
                                alt="{{$item['name']}}"
                        >
                        <div class="carousel-caption d-none d-md-block">
                            <h5>
                                {{$item['name']}}
                            </h5>
                        </div>
                    @endforeach
                </div>
                @foreach($categorys as $item)
                    <div class="carousel-item ">
                        <img
                                src="images/{{$item['image']}}"
                                class="d-block w-100"
                                alt="{{$item['name']}}"
                        >
                        <div class="carousel-caption d-none d-md-block">
                            <h5>
                                {{$item['name']}}
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <button  data-bs-slide="prev" data-bs-target="#car" class="carousel-control-prev" type="button">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">PREV</span>
            </button>
            <button  data-bs-slide="next" data-bs-target="#car" class="carousel-control-next" type="button">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">NEXT</span>
            </button>
        </div>
    </div>
    <div class="col-8 mx-auto text-center" style="margin-bottom: 100px;min-height: 100px">
        <h1>Новинки</h1>
        <hr>
    </div>
    <div class="container " style="margin-bottom: 100px">
        <div class="row gy-4 " >
        @foreach($Product as $item)
            <div class="col-md-6 col-sm-12">

                <div class="card ">
                    <div class="card-title pt-2 ps-2">
                        <h3>{{$item->name}}</h3>
                    </div>
                    <a href="/{{$item->id}}" class="card-body">
                        <img
                                class="d-block w-100"
                                alt="{{$item->name}}"
                                src="images/{{$item->ProductCategories->name==='Итальянская кухня'?'it-kitchen':'ru-kitchen'}}/{{$item->image}}"
                                style="max-height: 400px"
                        >
                    </a>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Цена: {{$item->price}}</span>
                        @auth()
                            <form
                                action="{{route('basket.add',['id'=>$item->id])}}"
                                method="POST"
                            >
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">
                                    Добавить
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="col-8 mx-auto text-center" style="margin-bottom: 100px;min-height: 100px">
        <h1>Контакты</h1>
        <hr>
    </div>
    <div class="container">
        <div class="row gy-5">
            <div >
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2280.453732364834!2d61.43884591571511!3d55.14033834652779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5f2b046f0a6e3%3A0xa8e7cc2cd7c94056!2z0YPQuy4g0JPQsNCz0LDRgNC40L3QsCwgMTQsINCn0LXQu9GP0LHQuNC90YHQuiwg0KfQtdC70Y_QsdC40L3RgdC60LDRjyDQvtCx0LsuLCA0NTQwMTA!5e0!3m2!1sru!2sru!4v1652799390392!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="row justify-content-between g-5 gy-5 text-center">
                <h3 class="col-md-6 col-sm-12">
                    Адрес: г. Челябинск, ул. Гагарина, д. 14
                </h3>
                <h3 class="col-md-6 col-sm-12">
                    Телефон: +7 908 123-45-67
                </h3>
            </div>
        </div>
    </div>
@endsection