@extends('layout/template')
@section('title','商品一覧')
@section('description','ディスクリプション')

@section('content')
  <div class="mb-5">
    <a class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2" href="/products/create">新規登録</a>
  </div>
  <table id="sort-table" class="table-auto w-full my-5">
    <thead>
      <tr>
        <th class="border" scope="col">商品ID</th>
        <th class="border" scope="col">商品名</th>
        <th class="border" scope="col">商品価格</th>
        <th class="border" scope="col">獲得ポイント</th>
        <th class="border" scope="col">編集/削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td class="border">{{$value['product_id']}}</td>
          <td class="border">{{$value['product_name']}}</td>
          <td class="border">{{$value['product_price']}}</td>
          <td class="border">{{$value['product_point']}}</td>
          <td class="border">
              <a class="text-blue-500 hover:text-blue-400 underline" href="/products/update/{{$value['product_id']}}">編集</a>
              <label>/</label>
              <a class="text-red-500 hover:text-red-400 underline" href="/products/delete/{{$value['product_id']}}">削除</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection