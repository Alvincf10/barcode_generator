<form action="{{ route('barcode.validate') }}" method="POST">
    @csrf
    <input type="text" class="form-class" name="barcode" id="barcode" placeholder="Scan barcode here" autofocus>
    <button type="submit">Validate</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
