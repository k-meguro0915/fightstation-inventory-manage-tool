@extends('layout/template')
@section('title','導入企業一覧')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">導入企業一覧</h2>
  <div class="mb-5">
      <a class="d-inline float-right mx-5" href="/company/create"><button class="btn btn-primary my-3">新規登録</button></a>
    </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">企業名</th>
        <th scope="col">住所</th>
        <th scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($company as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td>{{$value['company_id']}}</td>
          <td>{{$value['company_name']}}</td>
          <td>{{$value['prefecture']}}{{$value['address']}}</td>
          <td><a href="/company/update/{{$value['company_id']}}">編集</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection