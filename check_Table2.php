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
    text-align: center;
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
        text-align: center;
    }
}
</style>
	

<style>
body {
  font-family: 'Inconsolata', sans-serif;
  background: #2a364f;
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
    <div class="introduction-banner">
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
                            <li>
							<li><a href="#" class="button">How ot play</a></li>
							<li><a href="check_Table.php" class="button">Table</a></li>
							<li><a href="https://etherscan.io/address/0xcCdA5213d453388fB5fB43054BC261c8636b1e51#code" class="button">Smart Contract</a></li>
							<li><a href="#" class="button">Others</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="token-info" class="horse-features-main trading-crypto-main">
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
            <th>抽中樂透大獎獲得ETH</th>
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
            <td><?php echo $row[1];?></td>
            <td><?php echo $row[2];?></td>
            <td><?php echo $row[3];?></td>
            <td><?php echo $row[4];?></td>
            <td><?php echo $row[5];?></td>
        </tr>

	
		
		<?php
				}
			}
		?>
        <tbody>
    </table>
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
                <a href='https://reddit.com/r/Arina Millionaire' target="_blank" class="social-icons">
                    <div class="icon-main">
                        <img src="data:image/png;base64,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">
                    </div>
                    <p>reddit.com<br>/r/Arina Millionaire</p>
                </a>
                <a href='https://medium.com/@Arina Millionaire' target="_blank" class="social-icons">
                    <div class="icon-main">
                        <!-- <i class="icon-steemit"></i> -->
                        <img src="data:image/png;base64,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">
                    </div>
                    <p>medium.com/<br>@Arina Millionaire</p>
                </a>
                <a href='https://discord.gg/WKEZKvu' target="_blank"
                   class="social-icons">
                    <div class="icon-main">
                        <!-- <i class="icon-steemit-blog"></i> -->
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IgogICAgIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIKICAgICB2aWV3Qm94PSIwIDAgMjUyIDI1MiIKICAgICBzdHlsZT0iO2ZpbGw6I2YzOWMxMjsiCiAgICAgY2xhc3M9Imljb24gaWNvbnM4LWRpc2NvcmQiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDI1MnYtMjUyaDI1MnYyNTJ6IiBmaWxsPSJub25lIj48L3BhdGg+PGcgaWQ9IkxheWVyXzEiIGZpbGw9IiNmMzljMTIiPjxlbGxpcHNlIGN4PSIzOS45MzgiIGN5PSIzNC41IiB0cmFuc2Zvcm09InNjYWxlKDMuOTM3NSwzLjkzNzUpIiByeD0iMy45MzgiIHJ5PSI0LjUiPjwvZWxsaXBzZT48cGF0aCBkPSJNMjA1Ljc4NTU2LDYyLjc1NTg4Yy0xOC45NjMsLTE1LjI0MjA2IC01MS4yODIsLTE5LjM5MjE5IC01Mi42NTIyNSwtMTkuNTYxNWMtMS43MjA2OSwtMC4yMjQ0NCAtMy4zNjY1NiwwLjcxNjYzIC00LjA3NTMxLDIuMjk1NTZjLTAuMDk4NDQsMC4yMTY1NiAtMi4xMzgwNiw0Ljg0MzEzIC0zLjA2MzM3LDEwLjk1NDEyYy03Ljg0MzUsLTEuMDMxNjIgLTE0LjgyNDY5LC0xLjMxOTA2IC0yMC4wNjE1NiwtMS4zMTkwNmMtNS40MDYxOSwwIC0xMi42NjMsMC4yOTkyNSAtMjAuODI1NDQsMS40MTc1Yy0wLjkxNzQ0LC02LjE1ODI1IC0yLjk4MDY5LC0xMC44Mzk5NCAtMy4wNzkxMywtMTEuMDU2NWMtMC43MDg3NSwtMS41Nzg5NCAtMi4zNTQ2MiwtMi41MDQyNSAtNC4wOTEwNiwtMi4yOTU1NmMtMS4zMjY5NCwwLjE2OTMxIC0zMi43Njc4Nyw0LjMyNzMxIC01MS45Mjc3NSwxOS43Mzg2OWMtMTAuMDkxODEsOS4zMjQgLTMwLjI1OTY5LDYzLjU2MzA2IC0zMC4yNTk2OSwxMTAuMzIwODhjMCwwLjY4MTE5IDAuMTc3MTksMS4zNTQ1IDAuNTE1ODEsMS45NDkwNmMxMy40OTM4MSwyMy43MDM3NSA1My4zODQ2MiwzMy4yMDEgNjIuMzU4MTksMzMuNDg4NDRjMC4wNDMzMSwwIDAuMDgyNjksMCAwLjEyNiwwYzEuMTkzMDYsMCAyLjMyNzA2LC0wLjU0MzM3IDMuMDc1MTksLTEuNDc2NTZsMTMuNzYxNTYsLTE3LjE5OWM4LjgzMTgxLDEuNzU2MTMgMTguOTg2NjMsMi45MjU1NiAzMC41MDc3NSwyLjkyNTU2YzExLjQ2MjA2LDAgMjEuNTUzODgsLTEuMTU3NjIgMzAuMzQyMzgsLTIuOTAxOTRsMTMuNzQxODgsMTcuMTc1MzhjMC43NDQxOSwwLjkzMzE5IDEuODc4MTksMS40NzY1NiAzLjA3MTI1LDEuNDc2NTZjMC4wNDMzMSwwIDAuMDgyNjksMCAwLjEyNiwwYzguOTUzODgsLTAuMjg3NDQgNDguNzg1NjMsLTkuODI0MDYgNjIuMzUwMzEsLTMzLjY1MzgxYzAuMzM4NjMsLTAuNTkwNjIgMC41MTU4MSwtMS4yNjM5NCAwLjUxNTgxLC0xLjk0OTA2YzAuMDAzOTQsLTQ2LjY3MTE5IC0yMC4xNjM5NCwtMTAwLjgzNTQ0IC0zMC40NTY1NiwtMTEwLjMyODc1ek0xNzUuMDI1ODEsMjAwLjY2NjgxbC0xMC4wOCwtMTIuNmMyMi4xODc4MSwtNS45MDIzMSAzMy43MzY1LC0xNS4xNDM2MiAzNC40Mjk1LC0xNS43MTA2M2MxLjY3NzM4LC0xLjM3ODEyIDEuOTE3NTYsLTMuODUwODggMC41NDczMSwtNS41MzIxOWMtMS4zNzQxOSwtMS42NzczOCAtMy44NTA4OCwtMS45MjkzOCAtNS41MzYxMiwtMC41NjMwNmMtMC4yMzIzMSwwLjE4OSAtMjMuNjM2ODEsMTguODAxNTYgLTY4LjI5MiwxOC44MDE1NmMtNDQuNjE1ODEsMCAtNjguMjA1MzcsLTE4LjU4MTA2IC02OC40ODg4OCwtMTguODA1NWMtMS42ODEzMSwtMS4zNzAyNSAtNC4xNjE5NCwtMS4xMTgyNSAtNS41MzIxOSwwLjU3MDk0Yy0xLjM3NDE5LDEuNjg1MjUgLTEuMTIyMTksNC4xNjU4OCAwLjU2Nyw1LjU0MDA2YzAuNjk2OTQsMC41NjcgMTIuMjg4OTQsOS43NjUgMzQuNDQ1MjUsMTUuNjY3MzFsLTEwLjEwNzU2LDEyLjYzNTQ0Yy0xMS40NDIzNywtMS4yNzE4MSAtNDIuMjczLC0xMC40NjU4OCAtNTMuMzQxMzEsLTI4LjQ5MTc1YzAuMzA3MTIsLTQ0LjUyNTI1IDE5Ljc0NjU2LC05Ni4wOTQ2OSAyNy41MTkxOSwtMTAzLjI4ODVjMTMuOTY2MzEsLTExLjIyNTgxIDM2LjU0Mzk0LC0xNS45ODYyNSA0NC43MTQyNSwtMTcuNDAzNzVjMC41MjM2OSwxLjYyNjE5IDEuMTA2NDQsMy44NTg3NSAxLjQ2ODY5LDYuMzQzMzFjLTExLjc3NzA2LDIuMjc5ODEgLTI0LjcwMzg4LDYuMzc0ODEgLTM2LjQwNjEzLDEzLjYzNTU2Yy0xLjg1MDYzLDEuMTQ1ODEgLTIuNDE3NjMsMy41NzEzMSAtMS4yNzE4MSw1LjQxOGMxLjE0OTc1LDEuODU0NTYgMy41NzEzMSwyLjQyNTUgNS40MTgsMS4yNzE4MWMyMS4yNjI1LC0xMy4xODY2OSA0Ny4yNTM5NCwtMTUuMTU1NDQgNjAuODU0MDYsLTE1LjE1NTQ0YzEzLjY1MTMxLDAgMzkuNzI1NDQsMS45Njg3NSA2MC45OTE4NywxNS4xNTkzOGMwLjY0NTc1LDAuNDAxNjIgMS4zNjIzNywwLjU5MDYyIDIuMDcxMTMsMC41OTA2MmMxLjMxNTEyLDAgMi42MDY2MiwtMC42NjE1IDMuMzUwODEsLTEuODYyNDRjMS4xNDk3NSwtMS44NDY2OSAwLjU3ODgxLC00LjI3MjE5IC0xLjI3MTgxLC01LjQxOGMtMTEuOTgxODEsLTcuNDM0IC0yNS4yNjY5NCwtMTEuNTQwODEgLTM3LjI5OTk0LC0xMy43ODkxMmMwLjM2NjE5LC0yLjQzMzM3IDAuOTQxMDYsLTQuNjEwODEgMS40NTI5NCwtNi4yMDU1YzguMzA0MTksMS4zODYgMzEuNTM5MzcsNi4wOTkxOSA0NS40MTUxMiwxNy4yNDIzMWM3Ljk3NzM3LDcuMzY3MDYgMjcuNDA4OTQsNTguODY1NjMgMjcuNzIsMTAzLjMwMDMxYy0xMS4xMjM0NCwxOC4xMzIxOSAtNDEuOTE0NjksMjcuMzc3NDQgLTUzLjMzNzM4LDI4LjY0OTI1eiI+PC9wYXRoPjxlbGxpcHNlIGN4PSIyNCIgY3k9IjM0LjUiIHRyYW5zZm9ybT0ic2NhbGUoMy45Mzc1LDMuOTM3NSkiIHJ4PSI0IiByeT0iNC41Ij48L2VsbGlwc2U+PC9nPjwvZz48L3N2Zz4=">
                    </div>
                    <p>discord.gg/<br>WKEZKvu</p>
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
