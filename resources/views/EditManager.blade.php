@extends('layout/template')
@section('title','営業担当者編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/managers/update" method="POST">
    @csrf
    @include('components/form/FormManager',['is_read'=>false])
  </form>
</div>
@endsection