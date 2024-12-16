<?php

function enterlead($post){
    //die(var_dump($post));
    if (!sizeof($post)) return;
    $ch = curl_init();

    $post_field = array(
        'city' => $_POST['city'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'company' => $_POST['company'],
        'site' => $_POST['site'],
        //'activity' => $_POST['sfera'],
        'from' => 'Kupikupon-part.ru',
        'comments' => $_POST['comment'],
        'ip' => $_SERVER['REMOTE_ADDR']
    );

    curl_setopt($ch, CURLOPT_URL, "https://crm2.kupikupon.ru/manager/outs/lead");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($ch);

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    header("Location: /?success");
    die();
    //die(var_dump($httpcode));
}

?>