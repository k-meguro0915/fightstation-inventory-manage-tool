@extends('layout/template')
@section('title','商品新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">商品情報登録 確認</h2>
  <p>以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  <form action="/products/commit" method="POST">
    @csrf
    <label for="productId" class="form-label">商品ID</label>
    <input name="product_id" type="text" class="form-control" id="productId" readonly="" value="{{ $confirm->product_id }}">
    <label for="janCode" class="form-label">JANコード</label>
    <input name="jan_code" type="text" class="form-control" id="janCode" readonly="" value="{{ $confirm->jan_code }}">
    <label for="productName" class="form-label">商品名</label>
    <input name="product_name" type="text" class="form-control" id="productName" readonly="" value="{{ $confirm->product_name }}">
    <label for="productPrice" class="form-label">価格</label>
    <input name="product_price" type="number" class="form-control" id="productPrice" readonly="" value="{{ $confirm->product_price }}">
    <label for="productPoint" class="form-label">獲得ポイント</label>
    <input name="product_point" type="number" class="form-control" id="productPoint" readonly="" value="{{ $confirm->product_point }}">
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確定</button>
  </form>
</div>
@endsection