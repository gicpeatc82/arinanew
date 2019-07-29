<?php 
session_start();
require_once("mysql_connect.inc.php");
require_once("config.php"); 
require_once("inc/function.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="title" content="ARINA YAKYUKEN">
    <meta name="description" content="The World’s first DAPP for AV Star.">
    <meta name="author" content="">

    <title>ARINA YAKYUKEN WIN TABLE</title>
    <link rel="shortcut icon" href="https://www.arinamillion.com/arinanew/images/favicon_arina.ico" type="image/x-icon" />
	<link rel="Bookmark" href="https://www.arinamillion.com/arinanew/images/favicon_arina.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:400,500,600,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="https://js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/jquery.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ModifiersPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/CSSRulePlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/TextPlugin.min.js"></script>
    <script src="js/main.js"></script>
<style>
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 18px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: left;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 18px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: left;
    }
}
</style>
	

<style>
body {
  font-family: 'Inconsolata', sans-serif;
  background: #08011e;
}

h1{
  font:48px "微軟正黑體";
  width:auto;
  text-align: center;
  color: rgba(255,255,255,0.8);
}

h2{
  font:32px Arial, Helvetica, sans-serif;
  width:auto;
  text-align: center;
  color: rgba(255,255,255,0.8);
}

.credit{
  text-align: center;
  color: rgba(255,255,255,0.4);

}

.content{
  padding-top: 45px;
  padding-bottom: 20px;
}

.button_container{
    width: 176px;
    margin: 0 auto;
    margin-top: 30px;
    padding-top: 40px;
}

.button_su{
  overflow: hidden;
  position: relative;
  display: inline-block;
  border-radius: 3px;
  margin-bottom: 30px;
}

.su_button_circle{
  background-color: red;
  border-radius: 1000px;
  position: absolute;
  left:0;
  top:0;
  width: 0px;
  height: 0px;
  margin-left: 0px;
  margin-top: 0px;
  pointer-events: none;
  /*animation-timing-function: ease-in-out; */
}

.button_su_inner{
    display: inline-block;
    background: #F8B627;
    color: #F4F4F4;
    font-size: 16px;
    font-weight: normal;
    width: 132px;
    text-align: center;
    border-radius: 3px;
    transition: 400ms;
    text-decoration: none;
    padding: 22px;
    z-index: 100000;
}

.button_text_container{
   position:relative;
   z-index: 10000;
}

.explode-circle {
   animation: explode 0.5s forwards;

}

.desplode-circle{
   animation: desplode 0.5s forwards;
}

@keyframes explode {
  0% {
    width: 0px;
    height: 0px;
    margin-left: 0px;
    margin-top: 0px;
    background-color: rgba(42, 53, 80,0.2);
  }
  100% {
    width: 400px;
    height: 400px;
    margin-left: -200px;
    margin-top: -200px;
    background-color: rgba(20, 180, 87,0.8);
  }
}

@keyframes desplode {
  0% {
    width: 400px;
    height: 400px;
    margin-left: -200px;
    margin-top: -200px;
    background-color: rgba(20, 180, 87,0.8);
  }
  100% {
    width: 0px;
    height: 0px;
    margin-left: 0px;
    margin-top: 0px;
    background-color: rgba(129, 80, 108,0.6);
  }
}
</style>
<script>
$(function(){
	// 初始化 传入dom id
	var victor = new Victor("container", "output");
	var theme = [
			["#002c4a", "#005584"],
			["#35ac03", "#3f4303"],
			["#ac0908", "#cd5726"],
			["#18bbff", "#00486b"]
		]
	$(".color li").each(function(index, val) {
		var color = theme[index];
		 $(this).mouseover(function(){
			victor(color).set();
		 })
	});
});
</script>
</head>

<body>


<div class="main-outer text-center">
    <!-- Homepage Banner -->
    <div class="introduction-banner2">
	
	
<br><br><br><br><br><br><br>
<div id="token-info" class="arina-features-main trading-crypto-main">
<div class="container">
<h1>橋本有菜野球拳LEVEL獲獎表</h1>		
<h2>ARINA YAKYUKEN WIN TABLE</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>LEVEL</th>
            <th>最少GICT</th>
            <th>上限GICT</th>
            <th>獲勝時取得ARINA</th>
            <th>樂透大獎ETH獎金</th>
        </tr>
        </thead>
        <tbody>
	  
		<?php 		
	
			
		$sql = "SELECT * FROM `arina_win_table` ORDER BY `NO` ASC;";
		$result = mysqli_query($conn,$sql);

		
		$num = mysqli_num_rows($result);
		if($num>0)
		{
			for($i=0;$i<$num;$i++)
			{
			$row = mysqli_fetch_array($result);

			?>


        <tr>
            <td><center><?php echo $row[1];?></center></td>
            <td><center><?php echo $row[2];?></center></td>
            <td><center><?php echo $row[3];?></center></td>
            <td><center><?php echo $row[4];?></center></td>
            <td><center><?php echo $row[5];?></center></td>
        </tr>

	
		
		<?php
				}
			}
		?>
        <tr>
            <td colspan="5">
			◎"最少GICT"為玩家達到此LEVEL在以太坊地址中應有的GICT酷紅幣最少數量。<br>
			◎"上限GICT"為玩家達到此LEVEL在以太坊地址中應有的GICT酷紅幣上限數量。<br>
			◎"樂透大獎"的獲獎機率為百萬分之一。
			</td>
        </tr>
        <tbody>
    </table>
</div>
</div>
</div>
	
	
	
	
	
	
	
        <div class="header sticky-header">
            <div class="align-center header-inner">
                <div class="container clearfix">
                    <div class="logo">
                        <a href="index.html">
                            <h1 style="font-family: 'prometheus', 'Open Sans', sans-serif  ;font-weight: 400;">ARINA YAKYUKEN</h1>
                        </a>
                    </div>

                    <div class="navigation">
                        <ul>

							<li><a href="howtoplay.php" class="button">How ot play</a></li>
							<li><a href="check_Table.php" class="button">Table</a></li>
							<li><a href="https://etherscan.io/address/0xcCdA5213d453388fB5fB43054BC261c8636b1e51#code" class="button">Smart Contract</a></li>
							<li><a href="https://www.arinamillion.com/arina_universe.php" class="button">Others</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="social-section">
        <div class="container">
            <h2>JOIN OUR COMMUNITY</h2>
            <div class="social-icon-group">
                <a href='https://twitter.com/GIC48226830?lang=zh-tw' target="_blank" class="social-icons">
                    <div class="icon-main">
                        <!-- <i class="icon-tweeter"></i> -->
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IgogICAgIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIKICAgICB2aWV3Qm94PSIwIDAgNTAgNTAiCiAgICAgc3R5bGU9IjtmaWxsOiNmMzljMTI7IgogICAgIGNsYXNzPSJpY29uIGljb25zOC10d2l0dGVyIj48ZyBpZD0ic3VyZmFjZTEiPjxwYXRoIHN0eWxlPSIgIiBkPSJNIDM0LjIxODc1IDUuNDY4NzUgQyAyOC4yMzgyODEgNS40Njg3NSAyMy4zNzUgMTAuMzMyMDMxIDIzLjM3NSAxNi4zMTI1IEMgMjMuMzc1IDE2LjY3MTg3NSAyMy40NjQ4NDQgMTcuMDIzNDM4IDIzLjUgMTcuMzc1IEMgMTYuMTA1NDY5IDE2LjY2Nzk2OSA5LjU2NjQwNiAxMy4xMDU0NjkgNS4xMjUgNy42NTYyNSBDIDQuOTE3OTY5IDcuMzk0NTMxIDQuNTk3NjU2IDcuMjUzOTA2IDQuMjYxNzE5IDcuMjc3MzQ0IEMgMy45Mjk2ODggNy4zMDA3ODEgMy42MzI4MTMgNy40OTIxODggMy40Njg3NSA3Ljc4MTI1IEMgMi41MzUxNTYgOS4zODY3MTkgMiAxMS4yMzQzNzUgMiAxMy4yMTg3NSBDIDIgMTUuNjIxMDk0IDIuODU5Mzc1IDE3LjgyMDMxMyA0LjE4NzUgMTkuNjI1IEMgMy45Mjk2ODggMTkuNTExNzE5IDMuNjQ4NDM4IDE5LjQ0OTIxOSAzLjQwNjI1IDE5LjMxMjUgQyAzLjA5NzY1NiAxOS4xNDg0MzggMi43MjY1NjMgMTkuMTU2MjUgMi40MjU3ODEgMTkuMzM1OTM4IEMgMi4xMjUgMTkuNTE1NjI1IDEuOTQxNDA2IDE5LjgzOTg0NCAxLjkzNzUgMjAuMTg3NSBMIDEuOTM3NSAyMC4zMTI1IEMgMS45Mzc1IDIzLjk5NjA5NCAzLjg0Mzc1IDI3LjE5NTMxMyA2LjY1NjI1IDI5LjE1NjI1IEMgNi42MjUgMjkuMTUyMzQ0IDYuNTkzNzUgMjkuMTY0MDYzIDYuNTYyNSAyOS4xNTYyNSBDIDYuMjE4NzUgMjkuMDk3NjU2IDUuODcxMDk0IDI5LjIxODc1IDUuNjQwNjI1IDI5LjQ4MDQ2OSBDIDUuNDEwMTU2IDI5Ljc0MjE4OCA1LjMzNTkzOCAzMC4xMDU0NjkgNS40Mzc1IDMwLjQzNzUgQyA2LjU1NDY4OCAzMy45MTAxNTYgOS40MDYyNSAzNi41NjI1IDEyLjkzNzUgMzcuNTMxMjUgQyAxMC4xMjUgMzkuMjAzMTI1IDYuODYzMjgxIDQwLjE4NzUgMy4zNDM3NSA0MC4xODc1IEMgMi41ODIwMzEgNDAuMTg3NSAxLjg1MTU2MyA0MC4xNDg0MzggMS4xMjUgNDAuMDYyNSBDIDAuNjU2MjUgNDAgMC4yMDcwMzEgNDAuMjczNDM4IDAuMDUwNzgxMyA0MC43MTg3NSBDIC0wLjEwOTM3NSA0MS4xNjQwNjMgMC4wNjY0MDYzIDQxLjY2MDE1NiAwLjQ2ODc1IDQxLjkwNjI1IEMgNC45ODA0NjkgNDQuODAwNzgxIDEwLjMzNTkzOCA0Ni41IDE2LjA5Mzc1IDQ2LjUgQyAyNS40MjU3ODEgNDYuNSAzMi43NDYwOTQgNDIuNjAxNTYzIDM3LjY1NjI1IDM3LjAzMTI1IEMgNDIuNTY2NDA2IDMxLjQ2MDkzOCA0NS4xMjUgMjQuMjI2NTYzIDQ1LjEyNSAxNy40Njg3NSBDIDQ1LjEyNSAxNy4xODM1OTQgNDUuMTAxNTYzIDE2LjkwNjI1IDQ1LjA5Mzc1IDE2LjYyNSBDIDQ2LjkyNTc4MSAxNS4yMjI2NTYgNDguNTYyNSAxMy41NzgxMjUgNDkuODQzNzUgMTEuNjU2MjUgQyA1MC4wOTc2NTYgMTEuMjg1MTU2IDUwLjA3MDMxMyAxMC43ODkwNjMgNDkuNzc3MzQ0IDEwLjQ0NTMxMyBDIDQ5LjQ4ODI4MSAxMC4xMDE1NjMgNDkgOS45OTYwOTQgNDguNTkzNzUgMTAuMTg3NSBDIDQ4LjA3ODEyNSAxMC40MTc5NjkgNDcuNDc2NTYzIDEwLjQ0MTQwNiA0Ni45Mzc1IDEwLjYyNSBDIDQ3LjY0ODQzOCA5LjY3NTc4MSA0OC4yNTc4MTMgOC42NTIzNDQgNDguNjI1IDcuNSBDIDQ4Ljc1IDcuMTA1NDY5IDQ4LjYxMzI4MSA2LjY3MTg3NSA0OC4yODkwNjMgNi40MTQwNjMgQyA0Ny45NjQ4NDQgNi4xNjAxNTYgNDcuNTExNzE5IDYuMTI4OTA2IDQ3LjE1NjI1IDYuMzQzNzUgQyA0NS40NDkyMTkgNy4zNTU0NjkgNDMuNTU4NTk0IDguMDY2NDA2IDQxLjU2MjUgOC41IEMgMzkuNjI1IDYuNjg3NSAzNy4wNzQyMTkgNS40Njg3NSAzNC4yMTg3NSA1LjQ2ODc1IFogTSAzNC4yMTg3NSA3LjQ2ODc1IEMgMzYuNzY5NTMxIDcuNDY4NzUgMzkuMDc0MjE5IDguNTU4NTk0IDQwLjY4NzUgMTAuMjgxMjUgQyA0MC45Mjk2ODggMTAuNTMxMjUgNDEuMjg1MTU2IDEwLjYzNjcxOSA0MS42MjUgMTAuNTYyNSBDIDQyLjkyOTY4OCAxMC4zMDQ2ODggNDQuMTY3OTY5IDkuOTI1NzgxIDQ1LjM3NSA5LjQzNzUgQyA0NC42Nzk2ODggMTAuMzc1IDQzLjgyMDMxMyAxMS4xNzU3ODEgNDIuODEyNSAxMS43ODEyNSBDIDQyLjM1NTQ2OSAxMi4wMDM5MDYgNDIuMTQwNjI1IDEyLjUzMTI1IDQyLjMwODU5NCAxMy4wMTE3MTkgQyA0Mi40NzI2NTYgMTMuNDg4MjgxIDQyLjk3MjY1NiAxMy43NjU2MjUgNDMuNDY4NzUgMTMuNjU2MjUgQyA0NC40Njg3NSAxMy41MzUxNTYgNDUuMzU5Mzc1IDEzLjEyODkwNiA0Ni4zMTI1IDEyLjg3NSBDIDQ1LjQ1NzAzMSAxMy44MDA3ODEgNDQuNTE5NTMxIDE0LjYzNjcxOSA0My41IDE1LjM3NSBDIDQzLjIyMjY1NiAxNS41NzgxMjUgNDMuMDcwMzEzIDE1LjkwNjI1IDQzLjA5Mzc1IDE2LjI1IEMgNDMuMTA5Mzc1IDE2LjY1NjI1IDQzLjEyNSAxNy4wNTg1OTQgNDMuMTI1IDE3LjQ2ODc1IEMgNDMuMTI1IDIzLjcxODc1IDQwLjcyNjU2MyAzMC41MDM5MDYgMzYuMTU2MjUgMzUuNjg3NSBDIDMxLjU4NTkzOCA0MC44NzEwOTQgMjQuODc1IDQ0LjUgMTYuMDkzNzUgNDQuNSBDIDEyLjEwNTQ2OSA0NC41IDguMzM5ODQ0IDQzLjYxNzE4OCA0LjkzNzUgNDIuMDYyNSBDIDkuMTU2MjUgNDEuNzM4MjgxIDEzLjA0Njg3NSA0MC4yNDYwOTQgMTYuMTg3NSAzNy43ODEyNSBDIDE2LjUxNTYyNSAzNy41MTk1MzEgMTYuNjQ0NTMxIDM3LjA4MjAzMSAxNi41MTE3MTkgMzYuNjgzNTk0IEMgMTYuMzc4OTA2IDM2LjI4NTE1NiAxNi4wMTE3MTkgMzYuMDExNzE5IDE1LjU5Mzc1IDM2IEMgMTIuMjk2ODc1IDM1Ljk0MTQwNiA5LjUzNTE1NiAzNC4wMjM0MzggOC4wNjI1IDMxLjMxMjUgQyA4LjExNzE4OCAzMS4zMTI1IDguMTY0MDYzIDMxLjMxMjUgOC4yMTg3NSAzMS4zMTI1IEMgOS4yMDcwMzEgMzEuMzEyNSAxMC4xODM1OTQgMzEuMTg3NSAxMS4wOTM3NSAzMC45Mzc1IEMgMTEuNTMxMjUgMzAuODA4NTk0IDExLjgzMjAzMSAzMC40MDIzNDQgMTEuODE2NDA2IDI5Ljk0NTMxMyBDIDExLjgwMDc4MSAyOS40ODgyODEgMTEuNDc2NTYzIDI5LjA5NzY1NiAxMS4wMzEyNSAyOSBDIDcuNDcyNjU2IDI4LjI4MTI1IDQuODA0Njg4IDI1LjM4MjgxMyA0LjE4NzUgMjEuNzgxMjUgQyA1LjE5NTMxMyAyMi4xMjg5MDYgNi4yMjY1NjMgMjIuNDAyMzQ0IDcuMzQzNzUgMjIuNDM3NSBDIDcuODAwNzgxIDIyLjQ2NDg0NCA4LjIxNDg0NCAyMi4xNzk2ODggOC4zNTU0NjkgMjEuNzQ2MDk0IEMgOC40OTYwOTQgMjEuMzEyNSA4LjMyNDIxOSAyMC44MzU5MzggNy45Mzc1IDIwLjU5Mzc1IEMgNS41NjI1IDE5LjAwMzkwNiA0IDE2LjI5Njg3NSA0IDEzLjIxODc1IEMgNCAxMi4wNzgxMjUgNC4yOTY4NzUgMTEuMDMxMjUgNC42ODc1IDEwLjAzMTI1IEMgOS42ODc1IDE1LjUxOTUzMSAxNi42ODc1IDE5LjE2NDA2MyAyNC41OTM3NSAxOS41NjI1IEMgMjQuOTA2MjUgMTkuNTc4MTI1IDI1LjIxMDkzOCAxOS40NDkyMTkgMjUuNDE0MDYzIDE5LjIxMDkzOCBDIDI1LjYxNzE4OCAxOC45Njg3NSAyNS42OTUzMTMgMTguNjQ4NDM4IDI1LjYyNSAxOC4zNDM3NSBDIDI1LjQ3MjY1NiAxNy42OTUzMTMgMjUuMzc1IDE3LjAwNzgxMyAyNS4zNzUgMTYuMzEyNSBDIDI1LjM3NSAxMS40MTQwNjMgMjkuMzIwMzEzIDcuNDY4NzUgMzQuMjE4NzUgNy40Njg3NSBaICI+PC9wYXRoPjwvZz48L3N2Zz4=">
                    </div>
                    <p>twitter.com/<br>GIC48226830</p>
                </a>
                <a href='https://www.facebook.com/GlobalIdolCoin' target="_blank" class="social-icons">
                    <div class="icon-main">
                        <img src="images/facebook.png">
                    </div>
                    <p>facebook.com<br>GlobalIdolCoin</p>
                </a>
                <a href='https://www.gic-coin.com' target="_blank" class="social-icons">
                    <div class="icon-main">
                        <!-- <i class="icon-steemit"></i> -->
                        <img src="images/gic.png">
                    </div>
                    <p>www<br>gic-coin.com</p>
                </a>
                <a href='https://www.arinamillion.com' target="_blank"
                   class="social-icons">
                    <div class="icon-main">
                        <!-- <i class="icon-steemit-blog"></i> -->
                        <img src="images/world-512.png">
                    </div>
                    <p>Arina<br>Universe</p>
                </a>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row-flex">
                <p class="copyright links">Copyright © 2018 ARINA YAKYUKEN/GIC-COIN. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <!--Footer section-->
</div>


  <script type="text/javascript">



  </script>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/3.1.0/jquery.dotdotdot.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/89/three.min.js"></script>



</body>
</html>
