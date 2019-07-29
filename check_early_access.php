<?php 
session_start();
require_once("mysql_connect.inc.php");
require_once("config.php"); 
require_once("inc/function.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ARINA YAKYUKEN WIN TABLE</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/custom.js"></script>
    <link rel="shortcut icon" href="https://www.arinamillion.com/images/favicon_arina.ico" type="image/x-icon" />
	<link rel="Bookmark" href="https://www.arinamillion.com/images/favicon_arina.ico" type="image/x-icon" />
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
    font-size: 12px;
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
    font-size: 12px;
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


	
	
<script src="js/jquery.js"></script>
<script src="js/vector.js"></script>

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



		
<h1>ARINA Early Access List</h1>		
<div class="table-wrapper">


    <table class="fl-table">
        <thead>
        <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>ETH Address</th>
            <th>REGTime</th>
        </tr>
        </thead>
        <tbody>
	  
		<?php 		
	
			
		$sql = "SELECT * FROM `arina_universe_user` ORDER BY `NO` ASC;";
		$result = mysqli_query($conn,$sql);

		
		$num = mysqli_num_rows($result);
		if($num>0)
		{
			for($i=0;$i<$num;$i++)
			{
			$row = mysqli_fetch_array($result);

			?>


        <tr>
            <td><?php echo $row[0];?></td>
            <td><?php echo $row[1];?></td>
            <td><?php echo $row[2];?></td>
            <td><?php echo $row[3];?></td>
            <td><?php echo $row[4];?></td>
        </tr>

	
		
		<?php
				}
			}
		?>
        <tbody>
    </table>
</div>



<script>
$( ".button_su_inner" ).mouseenter(function(e) {
   var parentOffset = $(this).offset(); 
  
   var relX = e.pageX - parentOffset.left;
   var relY = e.pageY - parentOffset.top;
   $(this).prev(".su_button_circle").css({"left": relX, "top": relY });
   $(this).prev(".su_button_circle").removeClass("desplode-circle");
   $(this).prev(".su_button_circle").addClass("explode-circle");

});

$( ".button_su_inner" ).mouseleave(function(e) {

     var parentOffset = $(this).offset(); 

     var relX = e.pageX - parentOffset.left;
     var relY = e.pageY - parentOffset.top;
     $(this).prev(".su_button_circle").css({"left": relX, "top": relY });
     $(this).prev(".su_button_circle").removeClass("explode-circle");
     $(this).prev(".su_button_circle").addClass("desplode-circle");

});
</script>
	
		
		
		
		
		
		
		
		
</body>
</html>

