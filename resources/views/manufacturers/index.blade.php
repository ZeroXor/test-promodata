@extends('layouts.project')

@section('content')
    <h1>Производители</h1>

    <div>
        <a href="{{ route('manufacturers.create') }}" class="btn btn-success" role="button" aria-pressed="true">Добавить производителя</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Наименование производителя</th>
            <th scope="col">Количество товаров</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($manufacturers as $manufacturer)
            <tr>
                <td>{{ $manufacturer->name }}</td>
                <td>{{ $manufacturer->products_count }}</td>
                <td>
                    <a href="{{ route('manufacturers.edit', ['manufacturer' => $manufacturer->id]) }}" class="btn btn-primary" role="button" aria-pressed="true">Правка</a>
                    <form action="{{ route('manufacturers.destroy', ['manufacturer' => $manufacturer->id]) }}"
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
