@extends('layou')

@section('title','Контакты')

@section('content')
    <div class="col-8 mx-auto text-center" style="margin-bottom: 100px;min-height: 100px">
        <h1>Контакты</h1>
        <hr>
    </div>
    <div class="container">
        <div class="row gy-5">
            <div class="col-md-6 col-sm-12">
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2280.453732364834!2d61.43884591571511!3d55.14033834652779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5f2b046f0a6e3%3A0xa8e7cc2cd7c94056!2z0YPQuy4g0JPQsNCz0LDRgNC40L3QsCwgMTQsINCn0LXQu9GP0LHQuNC90YHQuiwg0KfQtdC70Y_QsdC40L3RgdC60LDRjyDQvtCx0LsuLCA0NTQwMTA!5e0!3m2!1sru!2sru!4v1652799390392!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6 col-sm-12">
                <h3 class="col">
                    Адрес: г. Челябинск, ул. Гагарина, д. 14
                </h3>
                <h3 class="col">
                    Телефон: +7 908 123-45-67
                </h3>
                <h3 class="col">
                    Email: planet@gmail.com
                </h3>
            </div>
        </div>
    </div>
@endsection