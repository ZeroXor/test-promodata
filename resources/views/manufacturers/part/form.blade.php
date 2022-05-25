@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $manufacturer->name ?? '' }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
