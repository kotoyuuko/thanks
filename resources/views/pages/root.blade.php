@extends('layouts.app')
@section('title', '我很可爱，请给我钱！')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <h1 class="logo">我很可爱，请给我钱！</h1>
        </div>
    </div>
    <div class="row">
        <div class="hidden-xs col-md-3 text-right">
            <h4>我一共收到了</h4>
            <h2 class="text-info">¥ 0.00</h2>
            <h4>零花钱</h4>
            <hr>
            <small>本站自豪地使用了</small><br>
            <small>世界上最好的 PHP 语言开发</small>
            <hr>
            <small>&copy; 2018 kotoyuuko</small>
        </div>
        <div class="visible-xs-block col-md-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <span>我一共收到了</span>
                    <span class="text-info">¥ 0.00</span>
                    <span>零花钱！</span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="payForm" class="form-horizontal" method="POST" action="{{ route('pay') }}">
                        {{ csrf_field() }}
                        <input id="inputPrice" type="hidden" name="price">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">称呼</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputName" placeholder="做好事要留名～">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="这个是用来显示头像的～">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSaying" class="col-sm-2 control-label">留言</label>
                            <div class="col-sm-10">
                                <textarea name="saying" class="form-control" rows="3" id="inputSaying" placeholder="顺便说几句话吧～"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">金额</label>
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-default" id="price-233">¥ 2.33</button>
                                <button type="button" class="btn btn-default" id="price-888">¥ 8.88</button>
                                <button type="button" class="btn btn-default" id="price-1024">¥ 10.24</button>
                                <button type="button" class="btn btn-default" id="price-2333">¥ 23.33</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">最后点一下</label>
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-success btn-block" id="pay">打赏</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row visible-xs-block">
        <hr>
        <div class="col-md-3 text-center">
            <small>本站自豪地使用了世界上最好的 PHP 语言开发</small><br>
            <small>&copy; 2018 kotoyuuko</small>
        </div>
    </div>
@stop
