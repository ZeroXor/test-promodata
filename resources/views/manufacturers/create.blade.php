@extends('layouts.project', ['title' => 'Добавить производителя'])

@section('content')
    <h1>Добавить нового производителя</h1>
    <form method="post" action="{{ route('manufacturers.store') }}">
        @include('manufacturers.part.form')
    </form>
@endsection
