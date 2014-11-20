<!DOCTYPE HTML>
<html>
<head>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <title>旅心Voluncation - 让你的身体和心灵都在路上！</title>
    <meta name="description" content="公益旅行">
    <meta name="keywords" content="公益, 旅行">
    <link rel="apple-touch-icon" href="touch/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="touch/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="touch/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="touch/apple-touch-icon-144x144.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <load href="__PUBLIC__/css/bootstrap.min.css" />
    <load href="__PUBLIC__/css/style.css" />
    <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
        <script src="js/respond.js"></script>
    <![endif]-->
</head>
<body class="no-js">
    <div class="main">
        <header>
            <div class="wrap">
                <!--<img src="upload/iphone.png" height="532" width="252" alt="" class="header-img">-->
                <div class="header-wrapper">
                    <h1>旅心<span>Voluncation</span></h1>
                    <p>让你的身体和心灵都在路上！<br/>无论你是否听说或参加过公益旅行，只要你愿意为需要的人群贡献自己的一点时间和精力，那么就来旅心Voluncation寻找适合你的旅行项目吧！</p>
                    <div class="buttons-wrapper">
                        <a href="#subscribe" class="button">订阅消息</a>
                        <a href="#favorite" class="button button-stripe">告诉我们你最想去哪？</a>
                    </div>
                </div>
                <!-- /.header-wrapper -->
            </div>
            <!-- /.wrap -->
        </header>
        <div class="spanning">
            <div class="video clearfix">
                <div class="wrap">
                    <div class="video-title">敬请期待</div>
                    <div class="video-subtitle">目前我们的网站正在建设中，希望在2015新年伊始之际与您见面！<br/>
                    关注公益旅行的小伙伴可以立即<a href="#subscribe">订阅</a>我们的最新消息！<br/>
                    希望把现有项目发布在我们平台的组织或个人也可以和我们<a href="#favorite">取得联系</a>！<br/>
                    <span style="color:#000">Volunteer+Vacation</span>,让身体和心灵同时在路上！</div>
                    <div class="video-block">
                    </div>
                    <div class="video-share-wrapper clearfix">
                        <ul class="social-list clearfix">
                            <li class="video-share-title">分享给你的小伙伴:</li>
                            <li><a id="wechatShare" data-toggle="popover" title="扫描以下二维码" href="#" class="social-twitter"><strong>微信</strong></a></li>
                            <li><a href="http://v.t.sina.com.cn/share/share.php?title=旅心Voluncation - 让身体和心灵同时在路上 http://www.voluncation.com, 无论你是否听说或参加过公益旅行，只要你愿意为需要的人群贡献自己的一点时间和精力，那么就来旅心Voluncation寻找适合你的旅行项目吧！ （分享自 @旅心Voluncation）" class="social-facebook"><strong>微博</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.videos clearfix -->


            <!--<div class="promo clearfix">
                <div class="wrap" style="text-align: center">
                    <div style="font-size:48px;text-align: center;margin-bottom:25px;">敬请期待</div>
                    <p>目前我们的网站正在建设中，希望在2015新年伊始之际与您见面！<br/>
关注公益旅行的小伙伴可以立即注册订阅我们的最新消息！<br/>
希望把现有项目发布在我们平台的组织或个人也可以和我们取得联系！<br/>
Volunteer+Vacation,让身体和心灵同时在路上！</p>
                </div>
                 /.wrap -->
            <!--</div>-->
            <!-- /.promo clearfix -->
            <!--/.comments-->
            <div class="modal fade" id="modalTell" tabindex="-1" role="dialog" aria-labelledby="ModalTellLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <form id="form_tell" action="{:U('/tell')}">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">取消</span></button>
                    <h4 class="modal-title" id="modaltell_title">亲，你的邮箱呢？</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label id="modaltell_label" for="curpas">你已选择<span style="color:#5bc0de" id="modal_location"></span>作为目的地偏好。</label>
                      <br/>
                      <input id="modaltell_email" type="text" class="form-control" id="curpas" placeholder="你的邮箱" value="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="btn_tell_cancel" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" id="btn_tell" class="btn btn-primary">确定</button>
                  </div>
                </div>
                </form>
              </div>
            </div>

            <a name="favorite"></a>
            <div class="comments clearfix">
                <div class="wrap">
                    <div class="tab">
                        <div class="box visible">
                            <h4><strong>泰国，非洲，尼泊尔，云南。。。</strong></h4>
                            <form>
                                <input id="location" type="text" placeholder="去哪里呢" class="input-text">
                                <h5>热门地点：<strong>泰国，非洲，尼泊尔，云南</strong></h5>
                                <br/>
                                <a id="tellus" data-toggle="modal" data-target="#modalTell" href="#" class="button button-stripe"  onclick="changeUserLocation()">告诉我们你最想去哪旅心</a>
                                <script>
                                    function changeUserLocation() {
                                        if(!$("#location").val().trim())
                                        {
                                            $("#tellus").attr("data-target", "#modal_alert");
                                            $("#modal_alert_notice").removeClass('alert-success').addClass('alert-danger');
                                            $("#modal_alert_notice").html("请输入你的目的地偏好。");
                                            $("#modal_alert_notice").show();
                                        }
                                        else
                                        {
                                            $("#tellus").attr("data-target", "#modalTell");
                                            $("#modal_location").text($("#location").val().trim().toUpperCase());
                                        }

                                        $("#location").val('');
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.comments clearfix -->
            
            <a name="subscribe"></a>
            <div class="newsletter clearfix">
                <div class="wrap">
                    <div class="newsletter-title">订阅消息</div>
                    <div class="newsletter-form clearfix">
                        <form id="form_subscription" action="{:U('/subscribe')}">
                            <input id="email" type="text" placeholder="你的邮箱地址" class="input-text">
                            <input id="btn_subscribe" type="button" class="button" value="订阅">
                        </form>
                    </div>
                    <p>如果你是希望把现有项目发布在我们平台的组织或个人也可以和我们取得联系<a href="mailto:team@voluncation.com?subject=发布项目&body=请给出项目详细资料或链接">team@voluncation.com</a></p>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.newsletter clearfix -->

            <!-- Modal -->
            <div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="ModalAlertLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
                    <h4 class="modal-title" id="ModalAlertLabel">亲，</h4>
                  </div>
                  <div class="modal-body">
                    <div id="modal_alert_notice" style="display:none" class="alert" role="alert"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                  </div>
                </div>
              </div>
            </div>
        <!-- /.spanning-columns -->
    </div>
    <!-- /.main -->
    <footer>
        <div class="wrap">
            <p>&copy; 2014 <strong>旅心 Voluncation.com</strong>, All Rights Reserved</p>
            <a href="{:U('/en')}">English Version</a>
        </div>
        <!-- /.wrap -->
    </footer>
    <img style="display:none" src="/getqrcode.jpg">
    <load href="__PUBLIC__/js/jquery.js" />
    <load href="__PUBLIC__/js/bootstrap.js" />
    <load href="__PUBLIC__/js/library.js" />
    <load href="__PUBLIC__/js/script.js" />
</body>
</html>