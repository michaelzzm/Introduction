

$(document).ready(function(){

    //nojs
    $("body").removeClass("no-js");

    //------------------------------------------------------------------------//

    //fakelink
    $('a[href="#"]').on('click',function(e){e.preventDefault();});

    //------------------------------------------------------------------------//

    //placeholder
    $('input[placeholder], textarea[placeholder]').placeholder();

    //------------------------------------------------------------------------//

    // tab
    $(function(){
        $('.tabs').delegate('li:not(.active)','click',function(){
            $(this).addClass('active').siblings().removeClass('active').parents('.tab').find('.box').hide().eq($(this).index()).fadeIn(250);
        })
    });

    // tab arrows
    if ( $(".tab").has(".tab-prev").length || $(".tab").has(".tab-next").length ) {
        $('.tab-prev, .tab-next').click(function(){
            var $active = $(this).parents(".tab").find(".tabs .active");
            $next = $(this).hasClass('tab-prev') ? $active.prev() : $active.next();
            if (!$next.length) $next = $(this).hasClass('tab-prev') ? $(this).parents(".tab").find('.tabs li:last') : $(this).parents(".tab").find('.tabs li:first');
            $next.click();
            return false;
        });
    }

    $('#btn_subscribe').click(function(){
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(!filter.test($('#email').val()))
        {
            $('#subscriptionnotice').removeClass('alert-success').addClass('alert-danger');
            $('#subscriptionnotice').html("Please enter valid email address.");
            $('#subscriptionnotice').show();

            $('#modal_subscription').modal('show');
        }
        else
        {
            var action = $('#form_subscription').attr('action');
            $.ajax({
                type: 'POST',
                url: action,
                data: {email:$('#email').val(), lang:$('#form_subscription')[0].baseURI},
                dataType: 'json',
                success: function(data) {
                    if(data['status'] != 1)
                    {
                        $('#subscriptionnotice').removeClass('alert-success').addClass('alert-danger');
                    }
                    else
                    {
                        $('#subscriptionnotice').removeClass('alert-danger').addClass('alert-success');
                    }

                    $('#subscriptionnotice').html(data['info']);
                    $('#subscriptionnotice').show();

                    $('#modal_subscription').modal('show');
                }
            });
        }

        $('#email').val('');
    });

    $('#modal_subscription').on('hidden.bs.modal', function(e) {
        $('#subscriptionnotice').hide();
    });
    
    $('#btn_tell').click(function(){
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(!filter.test($('#modaltell_email').val()))
        {
            $('#noticetell').removeClass('alert-success').addClass('alert-danger');
            $('#noticetell').html("Please enter valid email address.");
            $('#noticetell').show();

            $('#modaltell_email').val('');
        }
        else
        {
            $('#noticetell').hide();

            var action = $('#form_tell').attr('action');
            $.ajax({
                type: 'POST',
                url: action,
                data: {location:$('#modal_location').text(), email:$('#modaltell_email').val(), lang:$('#form_tell')[0].baseURI},
                dataType: 'json',
                success: function(data) {
                    $('#modaltell_title').html("Dear User,");

                     if(data['status'] != 1)
                    {
                        $('#noticetell').removeClass('alert-success').addClass('alert-danger');
                    }
                    else
                    {
                        $('#noticetell').removeClass('alert-danger').addClass('alert-success');
                    }
                    $('#noticetell').html(data['info']);
                    $('#noticetell').show();

                    $('#modaltell_label').hide();

                    $('#modaltell_email').hide();

                    $('#btn_tell_cancel').html("OK");
                    $('#btn_tell').hide();
                }
            });
        }
    });

    $('#modal_alert').on('hidden.bs.modal', function(e) {
        $('#modal_alert_notice').hide();
    });

    $('#modalTell').on('hidden.bs.modal', function(e) {
        $('#modaltell_title').html("Dear User, Your Email?");

        $('#noticetell').hide();

        $('#modaltell_label').show();

        $('#modaltell_email').val('');
        $('#modaltell_email').show();

        $('#btn_tell_cancel').html("Cancel");
        $('#btn_tell').show();
    });

    $("#getIp").click(function(){
        alert(remote_ip_info.country);
    });
    //------------------------------------------------------------------------//

    $('#wechatShare').popover({placement: 'bottom', html: true, content: '<img src="/getqrcode.jpg"><hr>或在微信中打开本网页分享给好友'}
      );
    
    //WeChat
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        // 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function (argv) {
            WeixinJSBridge.invoke('sendAppMessage', {
                "appid": "",
                "img_url": "http://www.voluncation.com/logo-wechat.jpg",
                "img_width": "128",
                "img_height": "128",
                "link": "http://www.voluncation.com/",
                "desc":  "让你的身体和心灵都在路上!",
                "title": "旅心Voluncation"
            }, function (res) {
                _report('send_msg', res.err_msg);
            })
        });

        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function (argv) {
            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": "http://www.voluncation.com/logo-wechat.jpg",
                "img_width": "128",
                "img_height": "128",
                "link": "http://www.voluncation.com/",
                "desc":  "让你的身体和心灵都在路上!",
                "title": "旅心Voluncation"
            }, function (res) {
                _report('timeline', res.err_msg);
            });
        });
    }, false);
    
});//document ready