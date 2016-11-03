@if (count($errors) > 0)
<div id="container-erros-mobile" class="row">
    @foreach ($errors->all() as $error)
    <div class="form-mobile-error">{{ $error }}</div>
    @endforeach
</div>
@endif
