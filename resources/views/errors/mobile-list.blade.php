<div class="error-container">
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="form-mobile-error">{{ $error }}</div>
    @endforeach
@endif
</div>
