@extends('layout/template')
@section('title','商品編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/products/confirm" method="POST">
    @csrf
    @include('components/form/FormProduct',['is_read'=>false])
  </form>
</div>
@endsection