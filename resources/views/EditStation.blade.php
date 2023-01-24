@extends('layout/template')
@section('title','ステーション情報編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <p class="text-red-500">※編集を確定すると、現在の在庫数はリセットされてしまいます。ご注意ください</p>
  <form class="flex flex-col flex-wrap" action="/stations/confirm" method="POST">
    @csrf
    <input type="hidden" name="confirm_type" value="update">
    <input type="hidden" name="station_id" @if(!empty($station)) value="{{ $station['station_id'] }}" @endif>
    @include('components/form/FormStation',['is_read'=>false])
  </form>
</div>
@endsection