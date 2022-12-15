@extends('layout/template')
@section('title','ステーション情報編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">ステーション情報編集</h2>
  <p class="text-danger">※編集を確定すると、現在の在庫数はリセットされてしまいます。ご注意ください</p>
  <form action="/stations/confirm" method="POST">
    @csrf
    <label for="companyId" class="form-label">導入企業ID</label>
    <input name="company_id" type="text" class="form-control" id="companyId"  value="{{$station['company_id']}}">
    <label for="stationId" class="form-label">ステーションID</label>
    <input name="station_id" type="text" class="form-control" id="stationId" value="{{$station['station_id']}}">
    <label for="stationName" class="form-label">ステーション名</label>
    <input name="station_name" type="text" class="form-control" id="stationName" value="{{$station['station_name']}}">

    <h3 class="my-3">在庫情報</h3>
    <?php $arr=array(); $inventory->each(function($item,$key) use(&$arr){ $arr[] = $item->getAttributes()['product_id']; });?>
    @for($i=0;$i < $input_field; $i++)
    <div class="form-inline w-100 my-3">
      <label for="products" class="form-label mx-2">商品在庫</label>
      <select class="custom-select mx-2" name="inventory[{{$i}}][product_id]" aria-label="Default select">
        <option value="">商品を選択</option>
        @foreach($products as $key => $value)
          <?php $value = $value->getAttributes();?>
          <option value="{{$value['product_id']}}" @if( !empty($arr[$i]) && $arr[$i] == $value['product_id'] ) selected @endif>{{$value['product_name']}}</option>
        @endforeach
      </select>
      <label for="inventory" class="form-label mx-2">在庫数</label>
      <input type="number" value="<?php if( $i < count($inventory) ) {?>{{$inventory[$i]->getAttributes()['inventory']}}<?php }?>" name="inventory[{{$i}}][inventory]" class="form-control mx-2" id="inventory">
    </div>
    @endfor
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確認</button>
  </form>
</div>
@endsection