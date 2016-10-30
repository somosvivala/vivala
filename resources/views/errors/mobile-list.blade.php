@if (count($errors) > 0)
<div class="row">
    @foreach ($errors->all() as $error)
    <div class="form-mobile-error">{{ $error }}</div>
    @endforeach
</div>
@endif
