@extends('layout/template')
@section('title','営業担当者新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <p class="mb-5">以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  <form class="flex flex-col flex-wrap" action="/inventory/commit" method="POST">
    @csrf
    <input type="hidden" name="station_id" value="{{$confirm->station_id}}">
    @foreach($confirm->inventory as $key => $value)
      @if(!empty($value['product_id']))
      <?php $product = $products[$value['product_id']-1]->getAttributes() ?>
      <div class="form-inline my-3">
        <label for="inventory_product" class="form-label mx-2">商品</label>
        <input readonly="readonly" type="text" class="mb-3 rounded mx-2" id="inventory_product" value="{{ $product['product_name'] }}">
        <input name="inventory[{{$key}}][product_id]" type="hidden" class="mb-3 rounded mx-2" id="inventory_product" value="{{ $value['product_id'] }}">
        <label for="inventory" class="form-label mx-2">在庫数</label>
        <input name="inventory[{{$key}}][inventory]" readonly="" type="text" class="mb-3 rounded mx-2" id="inventory" value="{{ $value['inventory'] }}">
      </div>
      @endif
    @endforeach
    <div class="flex flex-col flex-wrap items-end">
      <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確認</button>
    </div>

  </form>
</div>
@endsection