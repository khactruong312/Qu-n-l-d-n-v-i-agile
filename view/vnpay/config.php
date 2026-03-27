<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_TmnCode = "PEMNHSCT";
$vnp_HashSecret = "FOSCSXFK4F43LNOUVE8HF8A0HK3P80EX";
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

$vnp_Returnurl = "https://unfirmly-fulvous-lilianna.ngrok-free.dev/quan-ly-du-an-agile/index.php?act=online-payment-result";

$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));