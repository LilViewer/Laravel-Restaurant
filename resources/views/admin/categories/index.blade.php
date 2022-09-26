@extends('admin/home/admin_layout')

@section('AdminContent')
    <h3 class="mb-4">Все категории</h3>
    @if(session('success'))
    <div class="alert alert-danger" role="alert">
        <h4>
            {{session('success')}}
        </h4>
    </div>
    @endif
    <section class="content">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Название
                    </th>
                    <th>
                        Операция
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $item)
                    <tr>
                        <td>
                            {{$item['id']}}
                        </td>
                        <td>
                            {{$item['name']}}
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary" href="{{route('categories.edit',$item['id'])}}">
                                Редактировать
                            </a>
                            <form
                                action="{{route('categories.destroy',$item['id'])}}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection