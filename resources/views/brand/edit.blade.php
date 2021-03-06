@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Редактирование бренда</h1>
        <hr>
        <form action="{{ route('brand.update', $brand->id) }}" method="POST">

            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">

            <div class="form-group required">
                <label for="name">Название</label>
                <input type="text"
                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name"
                       required
                       value="{{ $brand->name }}">

                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-right">Изменить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
