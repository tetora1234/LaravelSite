<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container-fluid m-2 text-center">
                    <img src="{{ $review->product->packageimage  }}" class="img-fluid img-thumbnail d-inline-block"
                        width='200' height='100'>
                    <table class="table table-striped table-hover table-bordered d-inline align-middle">
                        <tbody>
                            <tr>
                                <td>品番</td>
                                <td>{{ $review->product->productno }}</td>
                            </tr>
                            <tr>
                                <td>タイトル</td>
                                <td>{{ $review->product->title }}</td>
                            </tr>
                            <tr>
                                <td>作家</td>
                                <td>{{ $review->product->author }}</td>
                            </tr>
                            <tr>
                                <td>メーカー</td>
                                <td>{{ $review->product->manufacturer }}</td>
                            </tr>
                            <tr>
                                <td>シリーズ</td>
                                <td>{{ $review->product->series }}</td>
                            </tr>
                            <tr>
                                <td>発売日</td>
                                <td>{{ $review->product->releasedate }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{ Form::open(['method'=>'put', 'route' => ['review.update', $review->id] ]) }}
                <div class="border border-secondary rounded mx-5 my-1">
                    <div class="mx-3 my-3">
                        <h1 class="bg-success text-white rounded"><i class="ms-3 fa-solid fa-pen"></i>レビュー</h1>
                        <h2>レビュー点数</h2>
                        <input type="range" class="form-range" min="1" max="5" step="1" name="points"
                            value="{{ $review->points }}">
                        <h2>感想</h2>
                        <div class="input-group">
                            <span class="input-group-text">こちらに記載</span>
                            <textarea class="form-control" aria-label="With textarea" name="review"
                                rows="10">{{ $review->review }}</textarea>
                        </div>
                    </div>
                    <div class="d-grid gap-4 col-6 mx-auto m-4">
                        {{ Form::button('<i class="fa-solid fa-file"></i> レビューを編集', ['class' => "btn
                        btn-light",'type' =>
                        'submit']) }}
                    </div>

                </div>
                {{ Form::close() }}
            </div>
        </div>
</x-app-layout>