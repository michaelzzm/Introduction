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
        $email = strtoupper($data['email']);
        
        if(empty($email))
        {
            $this->error('Your email address can not be empty!');
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

        $this->success('Subscription successful!', __APP__);
    }

    public function tell()
    {
        $data = I('post.');
        $location = strtoupper($data['location']);

        if(empty($location))
        {
            $this->error('Your destination can not be empty!');
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

        $this->success('Your destination has been registered successfully!');
    }
}