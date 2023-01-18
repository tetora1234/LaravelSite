<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        @auth
        <div class="d-inline-flex align-items-center mx-2 my-2">
          <button class="btn btn-primary" id="good-button">いいね！<i class="fas fa-thumbs-up"></i></button>
          <div id="good-value" class="mx-2 btn btn-light rounded-circle">{{ $good_value }}</div>
          <input type="hidden" id="first-click" value={{ $good_check }}>
          <input type="hidden" id="send-product-id" value={{ $product->id }}>
        </div>
        @endauth

        <div class="container-fluid m-2 text-center">
          <img src="{{ $product->packageimage }}" class="img-fluid img-thumbnail d-inline-block">
          <table class="table table-striped table-hover table-bordered d-inline align-middle">
            <tbody>
              <tr>
                <td>品番</td>
                <td>{{ $product->productno }}</td>
              </tr>
              <tr>
                <td>タイトル</td>
                <td>{{ $product->title }}</td>
              </tr>
              <tr>
                <td>作家</td>
                <td>{{ $product->author }}</td>
              </tr>
              <tr>
                <td>メーカー</td>
                <td>{{ $product->manufacturer }}</td>
              </tr>
              <tr>
                <td>シリーズ</td>
                <td>{{ $product->series }}</td>
              </tr>
              <tr>
                <td>発売日</td>
                <td>{{ $product->releasedate }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="d-grid gap-4 col-6 mx-auto m-4">
          <a href="{{ route('product.read', $product->id) }}" class="btn btn-primary">サンプルを見る</a>
        </div>

        <blockquote class="blockquote m-4 mx-5 border border-3 rounded-3">
          <p class="mx-2"><i class="fa-solid fa-book"></i>作品の説明文</p>
          <p class="mx-2">{!! nl2br(e(Str::limit($product->fulltext, 300, '...'))) !!}</p>
        </blockquote>

        <div class="d-grid gap-4 col-6 mx-auto m-4">
          <a href="{{ $product->affiliateurl }}" class="btn btn-primary">購入する</a>
        </div>

        @if ($authorProdacts->isEmpty())
        @else
        <div class="border border-3 rounded-3 mx-5 my-5">
          <div class="m-2">
            <p class="lead">作者の関連作品</p>
          </div>
          <div class="text-center">
            @foreach ($authorProdacts as $authorProdact)
            <div class="card d-inline-flex m-2 lead-photo-height">
              <a href="{{ route('product.show', $authorProdact->id) }}">
                <img src="{{ $authorProdact->packageimage }}" class="img-thumbnail lead-photo-height"
                  style="width: 300px; height: 300px; object-fit: cover;">
              </a>
            </div>
            @endforeach
            <style>
              .lead-photo-height {
                height: 300px;
              }
            </style>
          </div>
        </div>
        @endif

        <div class="border border-secondary rounded mx-5 my-1">
          <h1 class="bg-success text-white rounded mx-1 my-1"><i class="mx-1 far fa-thumbs-up"></i>レビュー</h1>
          @if($reviews->isEmpty())
          <div class="mx-3 my-3">
            <p>レビューはまだありません！</p>
          </div>
          @endif
          @foreach ($reviews as $review)
          <div class="border rounded-3 border-secondary mx-1 my-1">
            <div class="container">
              <div class="row">
                <div class="col-sm-3"><img class="rounded-circle mx-1 my-1" src="{{ $review->user->profile_photo_url }}"
                    alt="{{ $review->user->name }}" width='150' height='100'>
                  <div class="border rounded-3 border-secondary mx-1 my-1 text-left">
                    <p class="mx-1 my-1">名前：{{ $review->user->name }}さん</p>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="mb-3 my-3">
                    <label for="exampleFormControlTextarea1" class="form-label">☆の数</label>
                    @for ($i = 0; $i < $review->points; $i++)
                      <i class="fa-solid fa-star" style="color: #ffff00;"></i>
                      @endfor
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">感想</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" disabled
                      readonly>{{ $review->review }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          <div class="d-grid gap-4 col-6 mx-auto m-4">
            <a href="{{ route('review.create', $product->id) }}" class="btn btn-primary">レビューを書く</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @auth
  <script src="{{ asset('/js/product_show_goodbutton_click.js') }}"></script>
  @endauth

</x-app-layout>