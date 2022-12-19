@extends('layout/template')
@section('title','導入企業新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <form class="flex flex-col flex-wrap" action="/company/confirm" method="POST">
    @csrf
    @include('components/form/FormCompany',['is_read'=>false])
  </form>
</div>
@endsection