@extends('layout/template')
@section('title','在庫情報確認・変更')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/inventory/commit" method="POST">
    @csrf
    <table class="table-auto w-full my-5">
      <thead>
        <th class="border" scope="col">商品名</th>
        <th class="border" scope="col">在庫数</th>
        <th class="border" scope="col">現在の在庫数</th>
        <th class="border" scope="col">最終在庫補填日</th>
        <th class="border" scope="col">在庫の補充</th>
      </thead>
    @foreach($inventory as $key => $value)
      <?php $value = $value->getAttributes();?>
      <tr class="text-center">
        <td class="border">{{$value['product_name']}}</td>
        <td class="border" id="inventory{{$key}}">{{$value['inventory']}}</td>
        <td class="border"><input id="current_inventory{{$key}}" type="number" name="inventory[{{$key}}][inventory]" class="rounded w-16 lg:mx-5 p-2 my-2" value="{{$value['current_inventory']}}"></td>
        <td class="border">
          @if(!empty($value['updated_at']))
            {{ date('Y年m月d日 H時i分',strtotime($value['updated_at']) ) }}
          @else
            -
          @endif
        </td>
        <td class="border"><button type="button" class="bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-25" onclick="fullAddInventory('inventory{{$key}}','current_inventory{{$key}}')">在庫補充</button></td>
        <input type="hidden" name="inventory[{{$key}}][product_id]" value="{{$value['product_id']}}">
        <input type="hidden" name="inventory[{{$key}}][current_inventory]" value="{{$value['current_inventory']}}">
        <input type="hidden" name="inventory[{{$key}}][station_id]" value="{{$value['station_id']}}">
      </tr>
    @endforeach
    </table>
    <div class="flex flex-col flex-wrap items-end">
      <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">確定</button>
    </div>
  </form>
  <script type="text/javascript">
    function fullAddInventory(inventory_id,current_inventory_id){
      let max = document.getElementById(inventory_id).innerText;
      let input = document.getElementById(current_inventory_id);
      input.value = max;
    }
  </script>
</div>
@endsection