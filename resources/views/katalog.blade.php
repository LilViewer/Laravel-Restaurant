@extends('layou')

@section('title','Каталог')

@section('content')
    <div class="container " style="margin-bottom: 100px">
        <div class="d-flex " style="margin-bottom: 10px">
            <form method="GET" action="#" class="col-xl-4 col-md-6 col-sm-12">
                <label for="category_id" >
                    Категории
                </label>
                <select id="category_id" name="category_id">
                    <option value="0">
                        Все категории
                    </option>
                    @foreach($Categorys as $cat)
                        <option value="{{$cat->id}}">
                            {{$cat->name}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">
                    Выбрать
                </button>
            </form>
            <form action="#" method="GET">
                @csrf
                @method('GET')
                <label for="Sort_id">Сортировка</label>
                <select id="Sort_id" name="Sort_id">
                    <option value="0">
                        Выбрать сортировку
                    </option>
                    <option value="name">
                        По наименованию
                    </option>
                    <option value="price">
                        По цене
                    </option>
                </select>
                <button type="submit" class="btn btn-primary">
                    ОК
                </button>
            </form>
        </div>
        <div style="margin-bottom: 10px">
            @if($category_id!=0)
                @foreach($CategoryName as $data)
                    {{$data->name}}
                @endforeach
            @else
                {{$CategoryName}}
            @endif
        </div>
        <div class="row gy-4 " >
            @foreach($products as $item)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card ">
                        <div class="card-title pt-2 ps-2">
                            <h3>{{$item->name}}</h3>
                        </div>
                        <a href="/{{$item->id}}" class="card-body">
                            <img
                                    class="d-block w-100"
                                    alt="{{$item->name}}"
                                    src="images/{{$item->ProductCategories->catalog}}/{{$item->image}}"
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
@endsection