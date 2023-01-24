@extends('layout/template')
@section('title','商品新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <p>以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  @if(!empty($confirm->confirm_type))
  <form class="flex flex-col flex-wrap" action="/stations/update" method="POST">
  @else
  <form class="flex flex-col flex-wrap" action="/stations/commit" method="POST">
  @endif
    @csrf
    <label for="companyId" class="form-label">導入企業</label>
    <input name="company_id" readonly="" type="hidden" id="companyId"  value="{{$confirm->company_id }}">
    <input name="company_name" readonly="" type="text" class="mb-3 rounded" id="companyName"  value="{{$company['company_name'] }}">
    <input name="station_id" readonly="" type="hidden" id="stationId" value="{{ $confirm->station_id }}">
    <label for="stationName" class="form-label">ステーション名</label>
    <input name="station_name" readonly="" type="text" class="mb-3 rounded" id="stationName" value="{{ $confirm->station_name }}">
    @foreach($confirm->inventory as $key => $value)
      @if(!empty($value['product_id']))
      <div class="form-inline my-3">
      <label for="inventory_product" class="form-label mx-2">商品</label>
      <input readonly="" type="text" class="mb-3 rounded mx-2" id="inventory_product" value="{{ $value['product_id'] }}">
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