@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $product->name ?? '' }}">
</div>

<div class="form-group">
    @php
        $manufacturersIds = [];
        if (isset($product)) {
            foreach ($product->manufacturers as $manufacturer) {
                $manufacturersIds[] = $manufacturer->id;
            }
        }
    @endphp
    <select id="manufacturers" name="manufacturers[]" class="form-control" multiple="multiple" title="Производитель">
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}" @if (in_array($manufacturer->id, $manufacturersIds)) selected @endif>
                {{ $manufacturer->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
