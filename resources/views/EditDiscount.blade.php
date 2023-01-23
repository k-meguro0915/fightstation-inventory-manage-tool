@extends('layout/template')
@section('title','割引設定')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/stations/discount/update" method="POST">
    @csrf
    @include('components/form/FormDiscount',['is_read'=>false])
  </form>
</div>
@endsection