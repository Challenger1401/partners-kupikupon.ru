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

$RECAPTCHA_SITE_KEY = '6LdMIPEqAAAAANedvARceO_WNM-3nCmdNpwCiFqA';
$RECAPTCHA_SECRET_KEY = '6LdMIPEqAAAAAPJq3YWAVDH7T88VkKa25BDDcI7g';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptchaResponse'])) {

    // Задаем параметры
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = $RECAPTCHA_SECRET_KEY;
    $recaptcha_response = $_POST['recaptchaResponse'];

    // Обрабатываем параметры
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Выводим результат исходя из полученных данных
    if ($recaptcha->score >= 0.5) {
        enterlead($_POST);
    } else {
        // Код вывода ошибки
    }
}

?>