@extends('layout.main')

@section('content')

<div class="container-fluid m-2 text-center">
  <img src="{{ $product->packageimage }}" class="img-fluid img-thumbnail">
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

<blockquote class="blockquote m-4">
  <p>{{Str::limit($product->fulltext, 600, '...')}}</p>
</blockquote>

<div class="d-grid gap-4 col-6 mx-auto m-4">
  <a href="{{ $product->affiliateurl }}" class="btn btn-primary">購入する</a>
</div>

@endsection