@extends('layout.main')

@section('content')

<div class="container m-2">
    <div class="row">
        <div class="col">
            <select class="form-select" aria-label="Default select example">
                <option hidden>選択してください</option>
                <option value="1">One</option>
            </select>
        </div>
        <div class="col">
            <button class="btn btn-outline-success" type="button" id="button-addon2">
                <i class="fas fa-search"></i>検索</button>
        </div>
    </div>
</div>

<div class="text-center m-2">
    @foreach ($products as $product)
    <a href="{{ route('product.show', $product->id) }}">
        <img src="{{ $product->packageimage }}" class="img-fluid">
    </a>
    @endforeach
</div>

<div class="d-flex justify-content-center m-2">
    <div>{{ $products->links() }}</div>
</div>

@endsection