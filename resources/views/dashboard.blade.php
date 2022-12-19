@extends('layout/template')
@section('title','導入企業確認')
@section('description','ディスクリプション')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-red-600">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="/company">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                導入企業情報
            </div>
        </div>
      </a>
    </div>
</div>
<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="/product">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                登録商品一覧
            </div>
        </div>
      </a>
    </div>
</div>
<div class="py-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <a href="/stations">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
              ステーション一覧
          </div>
      </div>
    </a>
  </div>
</div>
@endsection