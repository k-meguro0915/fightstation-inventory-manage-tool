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
      <input id="inventory{{$key}}" type="number" readonly="" class="rounded bg-gray-300 w-16 lg:mx-5" id="inventory" value="{{$value['inventory']}}">
      <label for="current_inventory" class="lg:mx-2 mx-0">現在の在庫数</label>
      <input id="current_inventory{{$key}}" type="number" name="inventory[{{$key}}][inventory]" class="rounded w-16 lg:mx-5" value="{{$value['current_inventory']}}">
      <input type="hidden" name="inventory[{{$key}}][product_id]" value="{{$value['product_id']}}">
      <input type="hidden" name="inventory[{{$key}}][station_id]" value="{{$value['station_id']}}">
      <button type="button" class="bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-25" onclick="fullAddInventory('inventory{{$key}}','current_inventory{{$key}}')">在庫補充</button>
    </div>
    @endforeach
    <div class="flex flex-col flex-wrap items-end">
      <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確定</button>
    </div>
  </form>
  <script type="text/javascript">
    function fullAddInventory(inventory_id,current_inventory_id){
      let max = document.getElementById(inventory_id).value;
      let input = document.getElementById(current_inventory_id);
      input.value = max;
    }
  </script>
</div>
@endsection