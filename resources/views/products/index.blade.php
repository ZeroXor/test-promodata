@extends('layouts.project')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <h1 class="mt-2 mb-3">Товары</h1>

    <div>
        <a href="{{ route('products.create') }}" class="btn btn-success" role="button" aria-pressed="true">Добавить товар</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Наименование товара</th>
            <th scope="col">Производители</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach($product->manufacturers as $manufacturer)
                        {{ $manufacturer->name }}
                        @if(!$loop->last)
                            <span>, </span>
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary" role="button" aria-pressed="true">Правка</a>
                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                          style="display:inline" method="post" onsubmit="return confirm('Удалить эту запись?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
