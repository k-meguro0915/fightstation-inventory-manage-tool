@extends('layout/template')
@section('title','ステーション情報登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">ステーション情報登録</h2>
  <form action="/inventory/commit" method="POST">
    @csrf
    <h3 class="my-3">在庫情報</h3>
    @foreach($inventory as $key => $value)
    <?php $value = $value->getAttributes();?>
    <div class="form-inline w-100 my-3">
      <label for="products" class="form-label mx-2">商品名</label>
      <input type="text" readonly="" class="form-control" value="{{$value['product_name']}}">
      <label for="inventory" class="form-label mx-2">在庫数</label>
      <input type="number" readonly="" class="form-control mx-2" id="inventory" value="{{$value['inventory']}}">
      <label for="current_inventory" class="form-label mx-2">現在の在庫数</label>
      <input type="number" name="inventory[{{$key}}][inventory]" class="form-control" value="{{$value['current_inventory']}}">
      <input type="hidden" name="inventory[{{$key}}][product_id]" value="{{$value['product_id']}}">
      <input type="hidden" name="inventory[{{$key}}][station_id]" value="{{$value['station_id']}}">
    </div>
    @endforeach
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確定</button>
  </form>
</div>
@endsection