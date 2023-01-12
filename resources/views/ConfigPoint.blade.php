@extends('layout/template')
@section('title','ポイント設定')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <p>ログインポイント</p>
  <form class="flex flex-col flex-wrap"  action="/company/commit" method="POST">
    @csrf
    <label for="loginPoint" class="">ログインポイント</label>
    <input name="login_point" class="mb-3 rounded" type="number" min="0" id="loginPoint">
  </form>
</div>
@endsection