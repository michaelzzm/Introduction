<!DOCTYPE HTML>
<html>
<head>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <title>旅心Voluncation - Volunteer & Vacation, Experience your very vacation!</title>
    <meta name="description" content="Voluntourism">
    <meta name="keywords" content="Volunteer, Travel">
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
                    <p>Volunteer & Vacation, Experience your very vacation!<br/>If you are interested in volunteer tourism, or if you would like to use our platform to find volunteers for your programs, please don't hesitate to contact us! Subscribe our newsletter and stay tuned with us!</p>
                    <div class="buttons-wrapper">
                        <a href="#subscribe" class="button">Subscribe</a>
                        <a href="#favorite" class="button button-stripe">Tell us your perference?</a>
                    </div>
                </div>
                <!-- /.header-wrapper -->
            </div>
            <!-- /.wrap -->
        </header>
        <div class="spanning">
            <div class="video clearfix">
                <div class="wrap">
                    <div class="video-title">Coming Soon...</div>
                    <div class="video-subtitle">Our site is currently under construction. We will be available to you in the first quarter of 2015!<br/>
                    <a href="#subscribe">Subscribe</a> our newsletter and stay tuned with us!<br/>
                    Or you want to post programs and search for their qualified volunteers, please <a href="#favorite">Contact</a> us！<br/>
                    <span style="color:#000">Volunteer+Vacation</span>,Experience your very vacation!</div>
                    <div class="video-block">
                    </div>
                    <div class="video-share-wrapper clearfix">
                        <ul class="social-list clearfix">
                            <li class="video-share-title">Share:</li>
                            <li><a href="http://twitter.com/home?status=Voluncation - Volunteer %2B Vacation, Experience your very vacation! http://www.voluncation.com" class="social-twitter"><strong>Twitter</strong></a></li>
                            <li><a href="http://www.facebook.com/sharer.php?u=http://www.voluncation.com&t=Volunteer+Vacation, Experience your very vacation!" class="social-facebook"><strong>Facebook</strong></a></li>
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
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
                    <h4 class="modal-title" id="modaltell_title">Dear User, Your Email?</h4>
                  </div>
                  <div class="modal-body">
                    <div id="noticetell" style="display:none" class="alert" role="alert">
                    </div> 
                    <div class="form-group">
                      <label id="modaltell_label" for="curpas">You have chosen <span style="color:#5bc0de" id="modal_location"></span> as your preference.</label>
                      <br/>
                      <input id="modaltell_email" type="text" class="form-control" id="curpas" placeholder="Your Email Address" value="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="btn_tell_cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btn_tell" class="btn btn-primary">Confirm</button>
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
                            <h4><strong>Thailand, Africa, Nepal, YunNan...</strong></h4>
                            <form>
                                <input id="location" type="text" placeholder="Where to go?" class="input-text">
                                <h5>Hotplaces: <strong>Thailand, Africa, Nepal, YunNan</strong></h5>
                                <br/>
                                <a id="tellus" data-toggle="modal" data-target="#modalTell" href="#" class="button button-stripe"  onclick="changeUserLocation()">Tell us your preference</a>
                                <script>
                                    function changeUserLocation() {
                                        if(!$("#location").val().trim())
                                        {
                                            $("#tellus").attr("data-target", "#modal_alert");
                                            $("#modal_alert_notice").removeClass('alert-success').addClass('alert-danger');
                                            $("#modal_alert_notice").html("Please enter your destination preference.");
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
                    <div class="newsletter-title">Subscribe</div>
                    <div class="newsletter-form clearfix">
                        <form id="form_subscription" action="{:U('/subscribe')}">
                            <input id="email" type="email" placeholder="Your email address" class="input-text">
                            <input id="btn_subscribe" type="button" class="button" value="Subscribe">
                        </form>
                    </div>
                    <p>If you are those organizations in need of volunteers to post programs and search for their qualified volunteers. Please contact us at <a href="mailto:team@voluncation.com?subject=Post Program&body=Please provide program detail infomation or links of introduction">team@voluncation.com</a></p>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.newsletter clearfix -->

            <!-- Modal -->
            <div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="ModalAlertLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="ModalAlertLabel">Dear User,</h4>
                  </div>
                  <div class="modal-body">
                    <div id="modal_alert_notice" style="display:none" class="alert" role="alert"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                  </div>
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
            <a href="{:U('/zh')}">中文版</a>
        </div>
        <!-- /.wrap -->
    </footer>
    <load href="__PUBLIC__/js/jquery.js" />
    <load href="__PUBLIC__/js/library.js" />
    <load href="__PUBLIC__/js/bootstrap.js" />
    <load href="__PUBLIC__/js/script.js" />
</body>
</html>