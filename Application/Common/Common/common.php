<?php
use Vendor\PHPMailer;

function add_new_user($email)
{
    $subscription = M('Subscription', '', 'DB_CONFIG');

    $duplicate_entry = $subscription->where("email = '%s'", $email)->find();
    if($duplicate_entry)
    {
        $tuple['status'] = 1;
        $subscription->where("email = '%s'", $email)->save($tuple);
    }
    else
    {
        $tuple['email'] = $email;
        $tuple['status'] = 1;
        $subscription->add($tuple);
    }
}

function send_mail($email, $subject, $content)
{
    vendor('PHPMailer.class#phpmailer');
    vendor('PHPMailer.PHPMailerAutoload');

    $config = C('EMAIL_CONFIG');

    $mail= new \PHPMailer(); 
    $mail->isSMTP();                                
    $mail->SMTPAuth = true;                        
    $mail->SMTPSecure = "ssl";         
    $mail->Host = $config['SMTP_HOST'];
    $mail->Port = $config['SMTP_PORT'];
    $mail->Username = $config['SMTP_USER'];
    $mail->Password = $config['SMTP_PASS'];

    $mail->CharSet = 'utf-8';
    
    $mail->setFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
    $replyEmail = $config['REPLY_EMAIL'] ? $config['REPLY_EMAIL'] :$config['FROM_EMAIL'];
    $replayName = $config['REPLY_NAME'] ? $config['REPLY_NAME'] : $config['FROM_NAME'];
    $mail->addReplyTo($replyEmail, $replayName);

    $mail->addAddress($email);

    $mail->Subject = $subject;
    $mail->MsgHTML($content);

    return $mail->send() ? true : $mail->ErrorInfo;
}

function get_lang() {
    static $ip = NULL;
    if (getenv("HTTP_CLIENT_IP")){
    $ip = getenv("HTTP_CLIENT_IP");
    }else if(getenv("HTTP_X_FORWARDED_FOR")){
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    }else if(getenv("REMOTE_ADDR")){
    $ip = getenv("REMOTE_ADDR");
    }
    //var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']); test for browser language

    // IP地址合法验证
    $ips = explode(',', $ip);
    $addr = $ips[0];

    if(filter_var($addr, FILTER_VALIDATE_IP))
        $ip = $addr;

    if($ip=='127.0.0.1')
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js');
    else
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='.$ip); 
    if(empty($res)){ return false; }  
    $jsonMatches = array();  

    preg_match('#\{.+?\}#', $res, $jsonMatches);  
    if(!isset($jsonMatches[0])){ return false; }  
    $json = json_decode($jsonMatches[0], true);  
    if(isset($json['ret']) && $json['ret'] == 1){  
        $json['ip'] = $ip;  
        unset($json['ret']);  
    }else{  
        return false;  
    }  
    //$country = mb_convert_encoding($json[country], "GBK","UTF-8");
    $country = $json[country];
    //var_dump($json);
    //$this->assign('country', $country);
    if($country == "中国" || $country == "新加坡" || $country == "")
        return 'zh';
    else
        return 'en';
}

?>