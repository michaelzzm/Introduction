<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(get_lang()=='zh')
            $this->display('Chinese');
        else
            $this->display('English');
    }

    public function subscribe()
    {
        $data = I('post.');
        $email = strtoupper(trim($data['email']));

        //language decision
        $lang = get_lang();
        if(strpos($data[lang], 'en') > 0)
        {
            $lang = 'en';
        }
        else if(strpos($data[lang], 'zh') > 0)
        {
            $lang = 'zh';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            if($lang == 'zh')
            {
                $errMsg = '请输入正确的邮箱地址。';
            }
            else
            {
                $errMsg = "Please enter valid email address.";
            }

            $this->error($errMsg);
        }

        add_new_user($email);

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
        $lang = get_lang();
        if(strpos($data[lang], 'en') > 0)
        {
            $lang = 'en';
        }
        else if(strpos($data[lang], 'zh') > 0)
        {
            $lang = 'zh';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            if($lang == 'zh')
            {
                $errMsg = '请输入正确的邮箱地址。';
            }
            else
            {
                $errMsg = "Please enter valid email address.";
            }

            $this->error($errMsg);
        }
       
        $destination_subscription = M('DestinationSubscription', '', 'DB_CONFIG');
        $duplicate_entry = $destination_subscription->where("location = '%s' and email = '%s'", $location, $email)->find();
        if(!$duplicate_entry)
        {
            $tuple['location'] = $location;
            $tuple['email'] = $email;
            $destination_subscription->add($tuple);

            $destination = M('Destination', '', 'DB_CONFIG');
            $duplicate_entry = $destination->where("location = '%s'", $location)->find();
            if($duplicate_entry)
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
        }

        add_new_user($email);

        if($lang == 'zh')
        {
            $sucMsg = '我们会第一时间通过'.$email.'告知你'.$location.'相关的旅心哦!';
        }
        else
        {
            $sucMsg = 'We will inform you VOLUNCATION related with '.$location.' via '.$email.' at the first time!';
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