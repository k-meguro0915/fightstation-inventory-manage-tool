@extends('layout/template')
@section('title','導入企業新規登録')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">導入企業新規登録</h2>
  <form action="/company/confirm" method="POST">
    @csrf
    <label for="companyId" class="form-label">企業ID</label>
    <input name="company_id" type="text" class="form-control" id="companyId">
    <label for="companyName" class="form-label">企業名</label>
    <input name="company_name" type="text" class="form-control" id="companyName">
    <label for="prefecture" class="form-label">都道府県</label>
    <input name="prefecture" type="text" class="form-control" id="prefecture">
    <label for="address" class="form-label">住所（市区町村以下）</label>
    <input name="address" type="text" class="form-control" id="address">
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確認</button>
  </form>
</div>
@endsection