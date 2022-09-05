@extends('layouts.app')

@section('title', 'Аренда автомобиля')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Аренда автомобиля</h3>
            </div>
        </div>
        <form id="mainForm">
            @csrf
            <div class="row">
                <div class="col-5">
                    <label for="car">Автомобиль</label>
                    <select id="car" class="form-select">
                        @foreach ($cars as $car)
                            <option value="{{ $car->id }}">
                                {{ sprintf('%s (номер %s)', $car->name, $car->number) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-5">
                    <label for="user">Пользователь</label>
                    <select id="user" class="form-select">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 align-self-end">
                    <button class="btn btn-primary" type="submit">Арендовать</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <div id="response"></div>
            </div>
        </div>
    </div>
@stop

@section('css')

@endsection

@section('js')
    <script>
        const url_rent_car = `{{route('api.rent_car')}}`;
    </script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection
