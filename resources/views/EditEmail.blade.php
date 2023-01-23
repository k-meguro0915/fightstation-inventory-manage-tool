@extends('layout/template')
@section('title','メールアドレス設定')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/user/{user_id}/edit/email/commit" method="POST">
    @csrf
    @include('components/form/ValidateError')
    <label class="text-sm"><span class="text-red-500">*</span>は必須入力項目</label>
    <label for="email" class="">メールアドレス<span class="text-red-500">*</span></label>
    <input name="email" class="mb-3 rounded" type="text" id="email" @if(!empty($user['email'])) value="{{$user['email']}}" @endif>
    <input name="id" class="mb-3 rounded" type="hidden" id="id" @if(!empty($user['id'])) value="{{$user['id']}}" @endif>
    <span class="text-red-500">※在庫が少なくなるとメールが送信されます</span>
    <div class="flex flex-col flex-wrap items-end">
      <button type="button" class="d-inline float-right my-3 bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 w-16" onclick="submit()">登録</button>
    </div>
  </form>
</div>
@endsection