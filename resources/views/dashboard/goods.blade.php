<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mb-2">
                    <div class="row mx-1 mt-2">
                        <div
                            class="col-1 border border-1 bg-dark text-white d-flex align-items-center justify-content-center">
                            <p>No</p>
                        </div>
                        <div
                            class="col-3 border border-1 bg-dark text-white d-flex align-items-center justify-content-center">
                            <p>パッケージ画像</p>
                        </div>
                        <div
                            class="col-2 border border-1 bg-dark text-white d-flex align-items-center justify-content-center">
                            <p>品番</p>
                        </div>
                        <div
                            class="col-3 border border-1 bg-dark text-white d-flex align-items-center justify-content-center">
                            <p>作品タイトル</p>
                        </div>
                        <div
                            class="col-1 border border-1 bg-dark text-white d-flex align-items-center justify-content-center">
                            <p>いいね解除</p>
                        </div>
                        <div
                            class="col-1 border border-1 bg-dark text-white d-flex align-items-center justify-content-center">
                            <p>作品詳細</p>
                        </div>
                    </div>
                    @foreach ($goods as $good)
                    <div class="row mx-1">
                        <div class="col-1 border border-1 d-flex align-items-center justify-content-center">
                            <p>{{ $loop->index + 1 }}</p>
                        </div>
                        <div class="col-3 border border-1 d-flex align-items-center justify-content-center">
                            <img src="{{ $good->product->packageimage }}" class="my-2">
                        </div>
                        <div class="col-2 border border-1 d-flex align-items-center justify-content-center">
                            <p>{{ $good->product->productno }}</p>
                        </div>
                        <div class="col-3 border border-1 d-flex align-items-center justify-content-center">
                            <p>{{ $good->product->title }}</p>
                        </div>
                        <div class="col-1 border border-1 d-flex align-items-center justify-content-center">
                            {{ Form::open(['method'=>'delete', 'route' => ['product.deletegoods', $good->id] ]) }}
                            {{ Form::button('<i class="fas fa-thumbs-up"></i>', ['class'=>'btn-lg btn
                            btn-outline-primary mx-1 my-1', 'type' => 'submit']) }}
                            {{ Form::close() }}
                        </div>
                        <div class="col-1 border border-1 d-flex align-items-center justify-content-center">
                            {{ Form::open(['method'=>'get', 'route' => ['product.show', $good->product->id] ]) }}
                            {{ Form::button('<i class="fa-solid fa-right-to-bracket"></i>', ['class'=>'btn-lg btn
                            btn-outline-primary mx-1 my-1', 'type' => 'submit']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>