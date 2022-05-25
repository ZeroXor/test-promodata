@extends('layouts.project', ['title' => 'Редактирование товара'])

@section('content')
    <h1>Редактирование товара</h1>
    <form method="post" action="{{ route('products.update', ['product' => $product->id]) }}">
        @method('PUT')
        @include('products.part.form')
    </form>
@endsection
