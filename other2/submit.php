<?php

define('SYSTEM_ROOT_E', dirname(__FILE__) . '/');
include '../ayangw/common.php';
@header('Content-Type: text/html; charset=UTF-8');
$type = isset($_GET['type']) ? $_GET['type'] : exit('No type!');
if ($type == 'alipay') {
    $type = 'alipay';
} elseif ($type == 'qqpay') {
    $type = 'qqpay';
} else {
    $type = 'wxpay';
}
$or = daddslashes($_GET['out_trade_no']);
$sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$or}' limit 1";
$row = $DB->get_row($sql);

if (!$row || $row['money'] != $_GET['money']) {
    exit("验证失败1");
}
//error_reporting(E_ALL & ~E_NOTICE); //过滤脚本提醒
date_default_timezone_set('PRC'); //时区设置 解决某些机器报错
//接口配置
$codepay_config['id'] = '196132';                              //码支付ID
$codepay_config['key'] = 'CB95396BC5E1FC9ABA879C24146C3302';  //通信密钥
//字符编码格式 目前支持 gbk GB2312 或 utf-8 保证跟文档编码一致 建议使用utf-8
$codepay_config['chart'] = strtolower('utf-8');

//是否启用免挂机模式 1为启用. 未开通请勿更改否则资金无法及时到账
$codepay_config['act'] = "0"; //认证版则开启 一般情况都为0
$codepay_config['domain'] = "http://" . $_SERVER['HTTP_HOST'];

/**订单支付页面显示方式
 * 1: GET框架云端支付 (简单 兼容性强 自动升级 1分钟可集成)
 * 2: POST表单到云端支付 (简单 兼容性强 自动升级)
 * 3：自定义开发模式 (默认 复杂 需要一定开发能力 手动升级 html/codepay_diy_order.php修改收银台代码)
 * 4：高级模式(复杂 需要较强的开发能力 手动升级 html/codepay_supper_order.php修改收银台代码)
 */
$codepay_config['page'] = 4; //支付页面展示方式

//支付页面风格样式 仅针对$codepay_config['page'] 参数为 1或2 才会有用。
$codepay_config['style'] = 1; //暂时保留的功能 后期会生效 留意官网发布的风格编号


//二维码超时设置  单位：秒
$codepay_config['outTime'] = 360;//360秒=6分钟 最小值60  不建议太长 否则会影响其他人支付

//最低金额限制
$codepay_config['min'] = 0.01;


$codepay_config['return_url'] = $codepay_config['domain'] . '/other2/codepay_return.php';
$codepay_config['notify_url'] = $codepay_config['domain'] . '/other2/codepay_notify.php';
$pay_id = $or;
$param = $pay_id;


$price = $row['money'];

if ($conf['qrcode'] == '1') $codepay_config["qrcode_url"] = $codepay_config['domain'] . "/codepay/qrcode.php";

$codepay_config['pay_type'] = 1;

if ($codepay_config['pay_type'] == 1 && $type == 1) $codepay_config["qrcode_url"] = '';

$data = array(
    "pid" => (int)$codepay_config['id'],//平台ID号
    "type" => $type,//支付方式  
    "out_trade_no" => $pay_id,//订单编号
    "notify_url" => $codepay_config["notify_url"],//付款后通知该页面处理业务
    "return_url" => $codepay_config["return_url"],//付款后附带加密参数跳转到该页面
    "name" => 'faka',//自定义参数
    "money" => (float)$price,//原价
    "sitename" => 'faka',//自定义参数

);

ksort($data); //重新排序$data数组
reset($data); //内部指针指向数组中的第一个元素
$sign = '';
$urls = '';
foreach ($data AS $key => $val) {
    if ($val == '') continue;
    if ($key != 'sign') {
        if ($sign != '') {
            $sign .= "&";
            $urls .= "&";
        }
        $sign .= "$key=$val"; //拼接为url参数形式
        $urls .= "$key=" . urlencode($val); //拼接为url参数形式
    }
}
$key = md5($sign . $codepay_config['key']);//替换为自己的密钥
$query = $urls . '&sign=' . $key; //创建订单所需的参数

$url = "http://woyipay.com/submit.php?{$query}"; //支付页面

header("Location:{$url}");

?>