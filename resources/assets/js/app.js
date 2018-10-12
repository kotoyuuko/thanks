require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app'
});

$(function () {
    var price = '0';

    function showMessage(msg) {
        $('#msg-body').html(msg);
        $('#myModal').modal();
    }

    function btnClick(label) {
        obj = $('#price-' + label);
        obj.removeClass('btn-default');
        obj.addClass('btn-warning');
    }

    function btnUnclick(label) {
        obj = $('#price-' + label);
        obj.removeClass('btn-warning');
        obj.addClass('btn-default');
    }

    $('#price-233').click(function () {
        price = '233';
        btnClick('233');
        btnUnclick('888');
        btnUnclick('1024');
        btnUnclick('2333');
    });
    $('#price-888').click(function () {
        price = '888';
        btnClick('888');
        btnUnclick('233');
        btnUnclick('1024');
        btnUnclick('2333');
    });
    $('#price-1024').click(function () {
        price = '1024';
        btnClick('1024');
        btnUnclick('888');
        btnUnclick('233');
        btnUnclick('2333');
    });
    $('#price-2333').click(function () {
        price = '2333';
        btnClick('2333');
        btnUnclick('888');
        btnUnclick('1024');
        btnUnclick('233');
    });

    $('#pay').click(function () {
        let name = $('#inputName').val();
        let email = $('#inputEmail').val();
        let saying = $('#inputSaying').val();

        if (!name) {
            showMessage('神说：做好事要留名！');
            return;
        }
        if (!email) {
            showMessage('你确定做一个没有头像的人吗？');
            return;
        }
        if (!saying) {
            saying = '这位大佬什么也没说～';
        }
        if (price == '0') {
            showMessage('我很可爱，请给我钱！');
            return;
        }

        $('#inputPrice').val(price);

        $('#payForm').submit();
    });
});
