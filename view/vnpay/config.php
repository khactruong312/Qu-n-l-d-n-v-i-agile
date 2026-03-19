<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "PEMNHSCT"; //Website ID in VNPAY System
$vnp_HashSecret = "FOSCSXFK4F43LNOUVE8HF8A0HK3P80EX"; //Secret key (mã mặc định của VNPay Sandbox)
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "https://remittable-gelatinously-keesha.ngrok-free.dev/e-commerce-website-da1/index.php?act=online-payment-result";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
