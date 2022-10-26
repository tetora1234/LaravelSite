@extends('layout.main')

@section('content')

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