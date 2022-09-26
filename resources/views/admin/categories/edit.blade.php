@extends('admin/home/admin_layout')

@section('AdminContent')
    <h3 class="mb-4">Редактирование категории {{$category['name']}}</h3>
    @if(session('success'))
        <div class="alert alert-danger" role="alert">
            <h4>
                {{session('success')}}
            </h4>
        </div>
    @endif
    <section class="card  ">
        <form
                action="{{route('categories.update',$category['id'])}}"
                method="POST"
                enctype="multipart/form-data"
        >
            @method('PUT')
            @csrf
            <div class="card-body ">
                <div>
                    <label for="name">
                        <b>Название категории</b>
                    </label>
                    <input type="text" name="name" value="{{$category['name']}}" class="form-control mt-2" id="name" required placeholder="наименование">
                </div>
                <div>
                    <label for="name">
                        <b>Директория категории(по необходимости)</b>
                    </label>
                    <input type="text" name="directory" value="{{$category['catalog']}}" class="form-control mt-2" id="directory"  placeholder="Директория">
                </div>
                <div class="d-flex">
                    <div >
                        <label for="name">
                            <b>Изменение фото(по необходимости)</b>
                        </label>
                        <input type="file" name="images"  id="images" class="form-control mt-2"  >
                    </div>
                    <div >
{{--                        {{dd('/images/'.$category['catalog'].'/'.$category['image'])}}--}}
                        <img
                                src="/images/{{$category['catalog']}}/{{$category['image']}}"
                                alt="{{$category['name']}}"
                        >
                        <input type="hidden" name="imagesHidden" value="{{$category['image']}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Обновить
                </button>
            </div>
        </form>
    </section>
@endsection