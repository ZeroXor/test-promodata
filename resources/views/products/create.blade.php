@extends('layouts.project', ['title' => 'Добавить товар'])

@section('content')
    <h1>Добавить новый товар</h1>
    <form method="post" action="{{ route('products.store') }}">
        @include('products.part.form')
    </form>
@endsection
