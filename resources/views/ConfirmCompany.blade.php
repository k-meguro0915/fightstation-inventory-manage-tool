@extends('layout/template')
@section('title','導入企業確認')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">導入企業登録 確認</h2>
  <p>以下の情報で登録・更新します。確認の上、確定ボタンを押してください。</p>
  <form action="/company/commit" method="POST">
    @csrf
    <label for="companyId" class="form-label">企業ID</label>
    <input name="company_id" type="text" class="form-control" id="companyId" readonly="" value="{{ $confirm->company_id }}">
    <label for="companyName" class="form-label">企業名</label>
    <input name="company_name" type="text" class="form-control" id="companyName" readonly="" value="{{ $confirm->company_name }}">
    <label for="prefecture" class="form-label">都道府県</label>
    <input name="prefecture" type="text" class="form-control" id="prefecture" readonly="" value="{{ $confirm->prefecture }}">
    <label for="address" class="form-label">住所（市区町村以下）</label>
    <input name="address" type="text" class="form-control" id="address" readonly="" value="{{ $confirm->address }}">
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確定</button>
  </form>
</div>
@endsection