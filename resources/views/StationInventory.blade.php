@extends('layout/template')
@section('title','在庫情報一覧')
@section('description','ディスクリプション')

@section('content')
  <table id="sort-table" class="table-auto w-full my-5">
    <thead>
      <tr>
        <th class="border" scope="col">導入企業名</th>
        @if( $USER->id == 1 )
        <th class="border" scope="col">営業担当者名</th>
        @endif
        <th class="border" scope="col">ステーション名</th>
        <th class="border" scope="col">最終在庫補充日</th>
        <th class="border" scope="col">在庫設定</th>
        <th class="border" scope="col">在庫確認</th>
        <th class="border" scope="col">割引設定</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stations as $key => $value)
        <tr>
          <?php $value = $value->getAttributes();?>
          <td class="border">{{$value['company_name']}}</td>
          @if( $USER->id == 1 )
            <td class="border">{{$value['name']}}</td>
          @endif
          <td class="border">{{$value['station_name']}}</td>
          <td class="border">
            @if(!empty($value['updated_at']))
              {{ date('Y年m月d日 H時i分',strtotime($value['updated_at']) ) }}
            @else
              -
            @endif
          </td>
          <td class="border">
            <a class="text-blue-500 hover:text-blue-400 underline" href="/inventory/create/{{$value['station_id']}}">在庫設定</a>
          </td>
          <td class="border">
            <a class="text-blue-500 hover:text-blue-400 underline" href="/inventory/check/{{$value['station_id']}}">在庫確認</a>
          </td>
          <td class="border">
            <a class="text-blue-500 hover:text-blue-400 underline" href="/stations/discount/{{$value['station_id']}}">割引設定</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection