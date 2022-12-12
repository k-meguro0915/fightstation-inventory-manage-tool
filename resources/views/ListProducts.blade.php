@extends('layout/template')
@section('title','商品一覧')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">商品一覧</h2>
  <div class="mb-5">
      <a class="d-inline float-right mx-5" href="/products/create"><button class="btn btn-primary my-3">新規登録</button></a>
    </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">商品名</th>
        <th scope="col">商品価格</th>
        <th scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td>{{$value['product_id']}}</td>
          <td>{{$value['product_name']}}</td>
          <td>{{$value['product_price']}}</td>
          <td><a href="/products/update/{{$value['product_id']}}">編集</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection