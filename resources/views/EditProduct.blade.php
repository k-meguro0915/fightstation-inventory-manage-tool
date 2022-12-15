@extends('layout/template')
@section('title','商品編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">商品編集</h2>
  <form action="/products/confirm" method="POST">
    @csrf
    <label for="productId" class="form-label">商品ID</label>
    <input name="product_id" type="text" class="form-control" id="productId" value="{{$product['product_id']}}">
    <label for="janCode" class="form-label">JANコード</label>
    <input name="jan_code" type="text" class="form-control" id="janCode" minlength="8" maxlength="13"  value="{{$product['jan_code']}}">
    <label for="productName" class="form-label">商品名</label>
    <input name="product_name" type="text" class="form-control" id="productName" value="{{$product['product_name']}}">
    <label for="productPrice" class="form-label">価格</label>
    <input name="product_price" type="number" class="form-control" id="productPrice" value="{{$product['product_price']}}">
    <label for="productPoint" class="form-label">獲得ポイント</label>
    <input name="product_point" type="number" class="form-control" id="productPoint" value="{{$product['product_point']}}">
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確認</button>
  </form>
</div>
@endsection