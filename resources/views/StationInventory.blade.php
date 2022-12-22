@extends('layout/template')
@section('title','ステーション一覧')
@section('description','ディスクリプション')

@section('content')
  <div class="mb-5">
  </div>
  <table class="table-auto w-full my-5">
    <thead>
      <tr>
        <th class="border" scope="col">導入企業ID</th>
        <th class="border" scope="col">ステーションID</th>
        <th class="border" scope="col">ステーション名</th>
        <th class="border" scope="col">在庫確認・編集</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stations as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td class="border">{{$value['company_id']}}</td>
          <td class="border">{{$value['station_id']}}</td>
          <td class="border">{{$value['station_name']}}</td>
          <td class="border text-blue-500 hover:text-blue-400 underline"><a href="/inventory/check/{{$value['station_id']}}">在庫確認</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection