@extends('admin/home/admin_layout')

@section('AdminContent')
    <h3 class="mb-4">Добавить категорию</h3>
    @if(session('success'))
        <div class="alert alert-danger" role="alert">
            <h4>
                {{session('success')}}
            </h4>
        </div>
    @endif
    <section class="card  ">
        <form
            action="{{route('categories.store')}}"
            method="POST"
            enctype="multipart/form-data"
        >
            @method('POST')
            @csrf
            <div class="card-body ">
                <input type="text" name="name" class="form-control mt-2" id="name" required placeholder="наименование">
                <input type="file" name="images" id="images" class="form-control mt-2"  required>
                <input type="text" name="directory" class="form-control mt-2" id="directory" required placeholder="Директория">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Создать
                </button>
            </div>
        </form>
    </section>
@endsection