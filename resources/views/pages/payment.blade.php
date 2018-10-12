@extends('layouts.app')
@section('title', '我很可爱，请给我钱！')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>请扫描下面的二维码支付</h1>
            <p><img class="img-responsive" src="{{ $qrcode }}"></p>
            <p><small>支付记录将在支付成功后一分钟内更新～</small></p>
            <p><a class="btn btn-default" href="{{ route('root') }}">返回</a></p>
        </div>
    </div>
@stop
