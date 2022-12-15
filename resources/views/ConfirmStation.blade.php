@extends('layout/template')
@section('title','商品新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">商品情報登録 確認</h2>
  <p>以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  <form action="/stations/commit" method="POST">
    @csrf
    <label for="companyId" class="form-label">導入企業ID</label>
    <input name="company_id" readonly="" type="text" class="form-control" id="companyId"  value="{{$station['company_id']}}">
    <label for="stationId" class="form-label">ステーションID</label>
    <input name="station_id" readonly="" type="text" class="form-control" id="stationId" value="{{ $confirm->station_id }}">
    <label for="stationName" class="form-label">ステーション名</label>
    <input name="station_name" readonly="" type="text" class="form-control" id="stationName" value="{{ $confirm->station_name }}">
    <label for="stationPrefecture" class="form-label">都道府県</label>
    <input name="station_prefecture" readonly="" type="text" class="form-control" id="stationPrefecture" value="{{ $confirm->station_prefecture }}">
    <label for="stationAddress" class="form-label">市区町村以下</label>
    <input name="station_address" readonly="" type="text" class="form-control" id="stationAddress" value="{{ $confirm->station_address }}">
    @foreach($confirm->inventory as $key => $value)
      @if(!empty($value['product_id']))
      <div class="form-inline my-3">
      <label for="inventory_product" class="form-label mx-2">商品</label>
      <input readonly="" type="text" class="form-control mx-2" id="inventory_product" value="{{ $value['product_id'] }}">
      <input name="inventory[{{$key}}][product_id]" type="hidden" class="form-control mx-2" id="inventory_product" value="{{ $value['product_id'] }}">
      <label for="inventory" class="form-label mx-2">在庫数</label>
      <input name="inventory[{{$key}}][inventory]" readonly="" type="text" class="form-control mx-2" id="inventory" value="{{ $value['inventory'] }}">
      </div>
      @endif
    @endforeach
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確定</button>
  </form>
</div>
@endsection