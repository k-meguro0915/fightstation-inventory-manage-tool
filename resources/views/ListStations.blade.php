@extends('layout/template')
@section('title','商品一覧')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">ステーション一覧</h2>
  <div class="mb-5">
      <a class="d-inline float-right mx-5" href="/stations/create"><button class="btn btn-primary my-3">新規登録</button></a>
    </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">導入企業ID</th>
        <th scope="col">ステーションID</th>
        <th scope="col">ステーション名</th>
        <th scope="col">在庫確認・編集</th>
        <th scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stations as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td>{{$value['company_id']}}</td>
          <td>{{$value['station_id']}}</td>
          <td>{{$value['station_name']}}</td>
          <td><a href="/inventory/check/{{$value['station_id']}}">在庫確認</a></td>
          <td><a href="/stations/update/{{$value['station_id']}}">編集</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('components/InventoryModal')
@endsection