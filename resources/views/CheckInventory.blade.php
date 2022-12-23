@extends('layout/template')
@section('title','在庫情報確認・変更')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/inventory/commit" method="POST">
    @csrf
    @foreach($inventory as $key => $value)
    <?php $value = $value->getAttributes();?>
    <div class="flex lg:flex-row flex-col flex-wrap mb-5 p-2">
      <label for="products" class="lg:mx-2  mx-0">商品名</label>
      <input type="text" readonly="" class="rounded bg-gray-300" value="{{$value['product_name']}}">
      <label for="inventory" class="lg:mx-2 mx-0">在庫数</label>
      <input type="number" readonly="" class="rounded bg-gray-300" id="inventory" value="{{$value['inventory']}}">
      <label for="current_inventory" class="lg:mx-2 mx-0">現在の在庫数</label>
      <input type="number" name="inventory[{{$key}}][inventory]" class="rounded" value="{{$value['current_inventory']}}">
      <input type="hidden" name="inventory[{{$key}}][product_id]" value="{{$value['product_id']}}">
      <input type="hidden" name="inventory[{{$key}}][station_id]" value="{{$value['station_id']}}">
    </div>
    @endforeach
    <div class="flex flex-col flex-wrap items-end">
      <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確定</button>
    </div>
  </form>
</div>
@endsection