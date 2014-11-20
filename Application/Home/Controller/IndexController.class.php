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

        $subscription = M('Subscription', '', 'DB_CONFIG');
        $destination = M('Destination', '', 'DB_CONFIG');
        $destination_subscription = M('DestinationSubscription', '', 'DB_CONFIG');

        add_new_user($email);
        $email_id = $subscription->where("email = '%s'", $email)->getField('id');

        $location_id = $destination->where("location = '%s'", $location)->getField('id');
        if($location_id)
        {
            $duplicate_pref = $destination_subscription->where("location_id = '%s' and email_id = '%s'", $location_id, $email_id)->find();
            if(!$duplicate_pref)
            {
                $tuple_pref['location_id'] = $location_id;
                $tuple_pref['email_id'] = $email_id;
                $destination_subscription->add($tuple_pref);

                // update destination counter
                $counter = $destination->where("id = '%s'", $location_id)->getField('count');
                $tuple_destination['count'] =  $counter + 1;
                $destination->where("id = '%s'", $location_id)->save($tuple_destination);
            }
        }
        else
        {
            $tuple['location'] = $location;
            $tuple['count'] = 1;
            $destination->add($tuple);

            // create new entry for destination_subscription
            $tuple['location_id'] = $destination->where("location = '%s'", $location)->getField('id');
            $tuple['email_id'] = $email_id;
            $destination_subscription->add($tuple);
        }

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