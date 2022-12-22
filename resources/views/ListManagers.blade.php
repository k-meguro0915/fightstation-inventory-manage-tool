@extends('layout/template')
@section('title','営業担当管理')
@section('description','ディスクリプション')

@section('content')
  <div class="mb-5">
    <a class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2" href="/managers/create">新規登録</a>
  </div>
  <table class="table-auto w-full my-5">
    <thead>
      <tr>
        <th class="border" scope="col">ID</th>
        <th class="border" scope="col">担当者名</th>
        <th class="border" scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($managers as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td class="border">{{$value['id']}}</td>
          <td class="border">{{$value['name']}}</td>
          <td class="border text-blue-500 hover:text-blue-400 underline"><a href="/managers/create">編集</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection