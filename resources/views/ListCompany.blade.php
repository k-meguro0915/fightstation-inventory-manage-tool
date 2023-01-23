@extends('layout/template')
@section('title','導入企業一覧')
@section('description','ディスクリプション')

@section('content')
  <div class="mb-5">
    <a class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2" href="/company/create">新規登録</a>
  </div>
  <table class="table-auto w-full my-5">
    <thead>
      <tr>
        <th class="border" scope="col">ID</th>
        <th class="border" scope="col">担当者名</th>
        <th class="border" scope="col">企業名</th>
        <th class="border" scope="col">住所</th>
        <th class="border" scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($company as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td class="border">{{$value['company_id']}}</td>
          <td class="border">{{$value['name']}}</td>
          <td class="border">{{$value['company_name']}}</td>
          <td class="border">{{$value['prefecture']}}{{$value['address']}}</td>
          <td class="border">
            <a class="text-blue-500 hover:text-blue-400 underline" href="/company/update/{{$value['company_id']}}">編集</a>
            <span>/</span>
            <a class="text-red-500 hover:text-red-400 underline" href="/company/delete/{{$value['company_id']}}">削除</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection