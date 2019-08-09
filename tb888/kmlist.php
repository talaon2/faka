<?php

$title='卡密列表';
include './head.php';
$sql = "select * from ayangw_km";
$res =  $DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row = $DB->fetch($res)){
    $temp .="<tr><td>{$row['id']}</td> <td>".getName($row['gid'],$DB)."</td> <td>{$row['km']}</td> <td>{$row['benTime']}/<br>{$row['endTime']}</td> <td>{$row['out_trade_no']}/<br>{$row['trade_no']}</td>
    <td>{$row['rel']}</td> <td>".zt($row['stat'])."</td> <td><span id='{$row['id']}' class='btn btn-xs btn-primary btndel_km'>删除</span></td></tr>";
    if($i==10){
        array_push($arr,$temp);
        $temp = "";
        $i =0;
    }
    $i++;
}
function getName($id,$DB){
    $sql = "select * from ayangw_goods where id =".$id;
    $res =  $DB->query($sql);
    $row = $DB->fetch($res);
    return $row['gName'];
}
if($temp != ""){
    array_push($arr,$temp);
}
function zt($z){
    if($z == 1){
        return "<font color='red'>已使用</font>";
    }else if($z == 0){
        return "<font>未使用</font>";
    }
}
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>
<div class="container"  style="padding-top:70px;">
<div class="list-group">
			<div class="list-group-item list-group-item-info text-center">
			<h3>卡密列表</h3>
			</div>
			<div class="list-group-item list-group-item-info text-center">
			<button type="button" class="btn btn-danger" id="det_allkm">删除所有卡密</button>
			<button type="button" class="btn btn-warning" id="det_ykm">删除已使用卡密</button>
			</div>
			<div class="list-group-item list-group-item-success">
				
			<table class="table  table-hover text-center mytab" width="100%";style="text-align: center; ">
			 <tr  class="mytr" id="mytr_title">
			     <td>卡密ID</td><td>商品ID</td><td>卡密</td><td>导入时间<br>使用时间</td><td>使用订单<br>使用流水号</td><td>使用者</td><td>状态</td><td>操作</td>
			 </tr>
			 <?php
			 $page = 1;
			 if(count($arr)>0){
			 if(!empty($_GET['page'])){
			     $page = $_GET['page'];
			 }
			 echo $arr[($page-1)];
			 }
			 ?>
			</table>
            <?php 
            
            
            
            echo "<ul class='pagination'>";
            if(count($arr)>1){
                if($page != 1){
                echo "<li><a href='kmlist.php?page=1'>首页</a></li>";
                echo "<li><a href='kmlist.php?page=".($page-1)."'>上一页</a></li>";
                }
                if($page != count($arr)){
                echo "<li><a href='kmlist.php?page=".($page+1)."'>下一页</a></li>";
                echo "<li><a href='kmlist.php?page=".count($arr)."'>末页</a></li>";
                }
                echo "<li><div class='input-group' style='max-width:150px; float:left;'>
			<input type='text' id='txt_page' class='form-control' placeholder='总".count($arr)."页'>
			<span id='but_page' title='kmlist.php' alt='".count($arr)."'  class='input-group-addon' style='cursor:pointer'>跳转到</span>
		</div></li>";
                echo "</ul>";
                
            }
          
            ?>
			</div>
		</div>
		</div>
      
 
    </div>
  </div>
