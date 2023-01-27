@extends('layout/template')
@section('title','在庫情報新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/inventory/confirm" method="POST">
    @csrf
    <input type="hidden" name="station_id" value="{{$station_id}}">
    @include('components/form/FormInventory',['is_read'=>false])
  </form>
</div>
@endsection