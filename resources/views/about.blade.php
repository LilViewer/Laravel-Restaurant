@extends('layou')

@section('title','about')

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
    <div class="col-12 min-vw-100" style="padding: 0px">
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
@endsection