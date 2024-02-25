<?php
//config.php


//Database Connection Constants
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','TonePave66$');
define('DB_NAME','tblToDO');
define('DB_PORT',3306);

//SMS API Constants
define('HUBTEL_SMS_CLIENT_ID','kcaliqtv');
define('HUBTEL_SMS_API_SECRET','rmiumzxp');
define('HUBBTEL_SMS_API_ENDPOINT','https://smsc.hubtel.com/v1/messages/send');
define('MNOTIFY_SMS_API_ENDPOINT','https://apps.mnotify.net/smsapi');
define('MNOTIFY_SMS_API_KEY', 'fo0K4z1VizxW9Ie4oE3zxVmKY');


return[
    'db_host' => DB_HOST,
    'db_user' => DB_USER,
    'db_pass' => DB_PASS,
    'db_name' => DB_NAME,
    'db_port' => DB_PORT,
    'hubtel_sms_client_id' => 'kcaliqtv',
    'hubtel_sms_api_secret' => 'rmiumzxp',
    'hubtel_sms_api_endpoint' => 'https://smsc.hubtel.com?',
    'mnotify_sms_api_endpoint' => 'https://apps.mnotify.net/smsapi',
    'mnotify_sms_api_endpoint_quick'   => 'https://api.mnotify.com/api/sms/quick',
    'mnotify_sms_api_key' => 'fo0K4z1VizxW9Ie4oE3zxVmKY'
];

?>