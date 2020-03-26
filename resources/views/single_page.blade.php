
@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('/css/single_page.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1 category">
            <div>左邊</div>
            <div>左邊</div>
            <div>左邊</div>
            <div>左邊</div>
            <div>左邊</div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12">1</div>
                <div class="col-12">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            右邊
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection
