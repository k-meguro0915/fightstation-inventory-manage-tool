@extends('layout/template')
@section('title','ファイトステーション一覧')
@section('description','ディスクリプション')

@section('content')
  <div class="mb-5">
    <a class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2" href="/stations/create">新規登録</a>
  </div>
  <table id="sort-table" class="table-auto w-full my-5">
    <thead>
      <tr>
        <th class="border" scope="col">導入企業名</th>
        <th class="border" scope="col">ステーションID</th>
        <th class="border" scope="col">ステーション名</th>
        <th class="border" scope="col">在庫確認・編集</th>
        <th class="border" scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stations as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td class="border">{{$value['company_name']}}</td>
          <td class="border">{{$value['station_id']}}</td>
          <td class="border">{{$value['station_name']}}</td>
          <td class="border text-blue-500 hover:text-blue-400 underline">
            <a href="/inventory/check/{{$value['station_id']}}">在庫確認</a>
            <label>/</label>
            <a href="/stations/discount/{{$value['station_id']}}">割引設定</a>
            <label>/</label>
            <a href="/stations/edit/{{$value['station_id']}}">編集</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection