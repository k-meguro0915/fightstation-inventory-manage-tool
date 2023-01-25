@extends('layout/template')
@section('title','商品編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/products/confirm" method="POST">
    @csrf
    <input name="product_id" type="text" class="mb-3 rounded"id="productId" @if(!empty($product)) value="{{$product['product_id']}}" @endif @if($is_read==true) readonly="" @endif>
    @include('components/form/FormProduct',['is_read'=>false])
  </form>
</div>
@endsection