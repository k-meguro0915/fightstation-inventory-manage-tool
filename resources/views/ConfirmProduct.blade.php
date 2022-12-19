@extends('layout/template')
@section('title','商品新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <p>以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  <form class="flex flex-col flex-wrap" action="/products/commit" method="POST">
    @csrf
    @include('components/form/FormProduct',['is_read'=>false])
  </form>
</div>
@endsection