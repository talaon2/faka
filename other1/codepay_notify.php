<?php

define('SYSTEM_ROOT_E', dirname(__FILE__) . '/');
include '../ayangw/common.php';


ksort($_POST); //排序post参数
reset($_POST); //内部指针指向数组中的第一个元素
$sign = '';
foreach ($_POST AS $key => $val) {
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
if (!$_POST['pay_no'] || md5($sign . $conf['xq_key']) != $_POST['sign']) { //不合法的数据 KEY密钥为你的密钥
    exit('fail');
} else { //合法的数据
    $trade_no = $_POST['pay_no'];
    $out_trade_no = $_POST['param'];
    $sql = "SELECT * FROM ayangw_order WHERE out_trade_no='{$out_trade_no}' limit 1";
    $res = $DB->query($sql);
    $srow = $DB->fetch($res);
    $sql = "update ayangw_order set sta = 1, trade_no = '{$trade_no}' ,endTime = now() where out_trade_no = '{$out_trade_no}'";
    $sql2 = "UPDATE ayangw_km set endTime = now(),out_trade_no = '{$out_trade_no}',trade_no='{$trade_no}',rel ='{$srow['rel']}',stat = 1
        where gid = {$srow['gid']} and stat = 0
        limit  1";
    $DB->query($sql);
    $DB->query($sql2);
    exit('success');
}
?>