@extends('layout/template')
@section('title','ステーション情報登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/stations/confirm" method="POST">
    @csrf
    @include('components/form/FormStation',['is_read'=>false])
  </form>
</div>
@endsection