@extends('layouts.project', ['title' => 'Редактирование производителя'])

@section('content')
    <h1>Редактирование производителя</h1>
    <form method="post" action="{{ route('manufacturers.update', ['manufacturer' => $manufacturer->id]) }}">
        @method('PUT')
        @include('manufacturers.part.form')
    </form>
@endsection
