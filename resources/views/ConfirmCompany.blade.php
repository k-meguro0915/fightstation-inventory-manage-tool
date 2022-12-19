@extends('layout/template')
@section('title','導入企業確認')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <p>以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  <form class="flex flex-col flex-wrap"  action="/company/commit" method="POST">
    @csrf
    @include('components/form/FormCompany',['is_read'=>true])
  </form>
</div>
@endsection