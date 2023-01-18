<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{ Form::open(['method'=>'get', 'route' => ['product.index'] ]) }}
                <div class="row m-2 border border-light border-3 rounded">
                    <div class="col-auto m-2">
                        <select class="form-control px-5" name="tag">
                            <option value="" disabled selected style="display:none;">選択してください</option>
                            @foreach ($tagcategorys as $tagcategory)
                            <option value="{{ $tagcategory->name }}">{{ $tagcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto m-2">
                        {{ Form::text('content', null, ['placeholder' => 'コンテンツ検索', 'class' => 'form-control']) }}
                    </div>
                    <div class="col-auto m-2">
                        {{ Form::button('<i class="fa-solid fa-magnifying-glass"></i>', ['class' => "btn
                        btn-outline-success",'type' =>
                        'submit']) }}
                    </div>
                </div>
                {{ Form::close() }}

                <div class="container text-center">
                    @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ $product->packageimage }}" class="img-fluid img-thumbnail d-inline-block"
                            style="width: 390px; height: 300px; object-fit: cover;">
                    </a>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center m-2">
                    <div>{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>