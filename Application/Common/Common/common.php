<?php

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

?>