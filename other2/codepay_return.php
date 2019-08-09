<?php

define('SYSTEM_ROOT_E', dirname(__FILE__) . '/');
include '../ayangw/common.php';
function showalert($msg, $status, $orderid = null)
{
    echo '<meta charset="utf-8"/><script>window.location.href="../getkm.php?out_trade_no=' . $orderid . '";</script>';
}

$_POST = $_GET;
ksort($_POST); //排序post参数
reset($_POST); //内部指针指向数组中的第一个元素
$sign = '';
$conf['xq_key'] = '';  //通信密钥

foreach ($_POST AS $key => $val) { //遍历POST参数
    if ($val == '' || $key == 'sign' || $key == 'sign_type') continue; //跳过这些不签名
    if ($sign) $sign .= '&'; //第一个字符串签名不加& 其他加&连接起来参数
    $sign .= "$key=$val"; //拼接为url参数形式
}    

if (!$_POST['trade_no'] || md5($sign . $conf['xq_key']) != $_POST['sign']) { //不合法的数据 KEY密钥为你的密钥
    showalert('验证失败！', 4, '订单回调验证失败！');
} else { //合法的数据
    $trade_no = $_POST['pay_no'];
    $out_trade_no = $_POST['out_trade_no'];
    $sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$out_trade_no}' limit 1";
    $res = $DB->query($sql);
    $srow = $DB->fetch($res);
    $sql = "update ayangw_order set sta = 1, trade_no = '{$trade_no}' ,endTime = now() where out_trade_no = '{$out_trade_no}'";
    $sql2 = "UPDATE ayangw_km set endTime = now(),out_trade_no = '{$out_trade_no}',trade_no='{$trade_no}',rel ='{$srow['rel']}',stat = 1
        where gid = {$srow['gid']} and stat = 0
        limit  1";
    $DB->query($sql);
    $DB->query($sql2);
    showalert('您所购买的商品已付款成功，感谢购买！', 1, $out_trade_no);
}
?>
