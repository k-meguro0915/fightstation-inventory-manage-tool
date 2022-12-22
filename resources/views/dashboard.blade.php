@extends('layout/template')
@section('title','ダッシュボード')
@section('description','ディスクリプション')

@section('content')
<div class="py-12">
    @foreach( config('paging.nav_bar') as $key => $value)
        @if( ($USER->id == 1 && $value['role'] == 1) || ($USER->id != 1 && $value['role'] == 2) )
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="{{$value['link']}}">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{$value['name']}}
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection