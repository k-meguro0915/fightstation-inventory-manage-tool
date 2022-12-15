@extends('layout/template')
@section('title','導入企業編集')
@section('description','ディスクリプション')

@section('content')
<div class="my-5">
  <h2 class="mb-5">導入企業編集</h2>
  <form action="/company/confirm" method="POST">
    @csrf
    <label for="companyId" class="form-label">企業ID</label>
    <input name="company_id" type="text" class="form-control" id="companyId" value="{{ $company['company_id'] }}">
    <label for="companyName" class="form-label">企業名</label>
    <input name="company_name" type="text" class="form-control" id="companyName" value="{{ $company['company_name'] }}">
    <label for="prefecture" class="form-label">都道府県</label>
    <input name="prefecture" type="text" class="form-control" id="prefecture" value="{{ $company['prefecture'] }}">
    <label for="address" class="form-label">住所（市区町村以下）</label>
    <input name="address" type="text" class="form-control" id="address" value="{{ $company['address'] }}">
    <button type="button" class="btn btn-primary my-3" onclick="submit()">確認</button>
  </form>
</div>
@endsection