# faka

源码来源于网上  演示网站 https://faka.ssrsu.com

详细请看使用说明

目前这个源码里集成了两个支付

ABC支付接口申请地址：http://pay.sddyun.cn/user/reg.php

 码支付接口申请地址：https://codepay.fateqq.com
 
 码支付经过测试好用，第一个没测试
 
 
# 20190809更新 增加了一个新的支付对接方式


申请地址 http://woyipay.com

```
other1/submit.php   24和25行   修改成你自己的商户支付ID和通信密钥
```

如果切换成码支付的，修改js/ayangw.js 第95行

```
window.location.href ="other/submit.php?"+u;  这个是ABC云支付的
window.location.href ="other1/submit.php?"+u;  这个是码支付的
window.location.href ="other2/submit.php?"+u;  这个是woyipay的
```


