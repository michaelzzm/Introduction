<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

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
            $this->display('Chinese');
        else
            $this->display('English');
    }

    public function subscribe()
    {
        $data = I('post.');
        $email = strtoupper(trim($data['email']));

        //language decision
        $lang = 'zh';
        if(strpos($data[lang], 'en') > 0)
        {
            $lang = 'en';
        }
        
        if(empty($email))
        {
            if($lang == 'zh')
            {
                $errMsg = "你的邮箱不能为空！";
            }
            else
            {
                $errMsg = "Your email address can not be empty!";
            }

            $this->error($errMsg);
        }

        $subscription = M('Subscription', '', 'DB_CONFIG');

        $duplicate_subscriber = $subscription->where("email = '%s'", $email)->find();
        if($duplicate_subscriber)
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

        if($lang == 'zh')
        {
            $sucMsg = '你已经成功订阅我们的信息！';
        }
        else
        {
            $sucMsg = 'Your subscription is successful!';
        }

        $this->success($sucMsg, __APP__);
    }

    public function tell()
    {
        $data = I('post.');
        $location = strtoupper(trim($data['location']));
        $email = strtoupper(trim($data['email']));

        //language decision
        $lang = 'zh';
        if(strpos($data[lang], 'en') > 0)
        {
            $lang = 'en';
        }
        
        if(empty($location))
        {
            if($lang == 'zh')
            {
                $errMsg = "你的目的地不能为空！";
            }
            else
            {
                $errMsg = "Your destination can not be empty!";
            }

            $this->error($errMsg);
        }

        $destination = M('Destination', '', 'DB_CONFIG');

        $duplicate_location = $destination->where("location = '%s'", $location)->find();
        if($duplicate_location)
        {
            $count = $destination->where("location = '%s'", $location)->getField('count');

            $tuple['count'] = $count + 1;
            $destination->where("location = '%s'", $location)->save($tuple);
        }
        else
        {
            $tuple['location'] = $location;
            $tuple['count'] = 1;
            $destination->add($tuple);
        }

        if(!empty($email))
        {
            $destination_subscription = M('DestinationSubscription', '', 'DB_CONFIG');

            $tuple['location'] = $location;
            $tuple['email'] = $email;
            $destination_subscription->add($tuple);

            if($lang == 'zh')
            {
                $sucMsg = '我们会第一时间通知你'. $location. '相关的旅心哦!';
            }
            else
            {
                $sucMsg = 'We will inform you Voluncation related with '. $location. ' at the first time!';
            }
        }
        else
        {
            if($lang == 'zh')
            {
                $sucMsg = '旅心已记住你的目的地: '. $location. '。 快快订阅我们第一时间收取信息吧！';
            }
            else
            {
                $sucMsg = 'Voluncation writes down your desitination: '. $location. '</br>' . 'Please subscribe to get the up-to-date info!';
            }
        }

        $this->success($sucMsg);
    }

    public function en(){
        $this->display('English');
    }

    public function zh(){
        $this->display('Chinese');
    }
}