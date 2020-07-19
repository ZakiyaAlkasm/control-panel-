<?php
$conn=[
'host'=> 'localhost',
'user'=> 'root',
'database' =>'task4'
];
$mysql= mysqli_connect($conn['host'],$conn['user'],'',$conn['database']);

if($mysql){
echo "connected";}
else{
echo "not connect";}
?>
<html>
<head>
</head>
<header>
</header>
<body>
<main>
<form action="" method="post">
<div style="margin:10% 40%;">
  <label style="background:lightgray; font-weight: bold; font-size:150%;"> Right : </label>
  <input style="width:60%; border-radius:100px;" type="text" id="R" name="r">
<br><br>

  <label style="background:lightgray; font-weight: bold;font-size:150%;"> Left : </label>
  <input style="width:60%; border-radius:100px;" type="text" id="L" name="l">
<br><br>

  <label style="background:lightgray; font-weight: bold;font-size:150%;"> top : </label>
  <input style="width:60%; hight:100%;border-radius:100px; " type="text" id="T" name="T">
<BR><BR><BR>
    <button style=" font-weight: bold;font-size:150%; background:RED; border-radius:100px;"type="submit" name="t" id="t"  >  SAVE      </button>
	
	
	 <button  style=" font-weight: bold;font-size:150%; background:lightGREEN; border-radius:100px;" type="submit" name="s" id="t" >  START    </button>
         
    <button   style=" font-weight: bold;font-size:150%; background:lightBLUE ; border-radius:100px;"type="submit; " name="d" id="t"  >  DELETE   </button>
	
	<?PHP
	$n="";
	$RR=$_POST['r'];
	$LL=$_POST['l'];
	$TT=$_POST['T'];
	if(isset($_POST['t'])){
    
    $s="INSERT INTO function (L, R,T) VALUES ('$LL', '$RR','$TT')";
	if(mysqli_query($mysql,$s)){
	echo "inserted";}
	else{
	echo "there is some thing is wrong".mysqli_error($mysql);}}
?>

<BR><BR>
<?php
    $get_news_sql = "SELECT * FROM `function`";
    $get_news_sql = mysqli_query($mysql, $get_news_sql);
            ?>
    <table border="2">
    <tr>
    <th>RIGHT</th>
    <th>LEFT</th>
    <th>TOP</th>
    </tr>
			
<?PHP while ($row = mysqli_fetch_array($get_news_sql)) { ?>
<tr>
<td><?PHP echo $row['R'];?></td>
<td><?PHP echo $row['L'];?></td>
<td><?PHP echo $row['T'];?></td>
</tr>
<?PHP }?>
</table>
   
   <?PHP
   
   
    if(isset($_POST['d'])){
   $get_news_sql = "DELETE FROM `function`";
   $get_news_sql = mysqli_query($mysql, $get_news_sql);}
            ?>
	
	<br><br>
	
	<?php
	 
	 if(isset($_POST['s'])){?>
	 <svg width="200" height="200" style="background:pink" >; 
	  
	   <circle cx="10" cy="150" r="2" fill="red"/>
	   	<circle cx="150" cy="10" r="2" fill="red"/>
		<circle cx="10" cy="10" r="2" fill="red"/>
	 	<circle cx="150" cy="150" r="2" fill="red"/>

        <path d="M 10 10  V 150 H 10 z " fill="transparent" stroke="YELLOW"/>
	      <path d="M 10 10  V 10 H 150 z " fill="transparent" stroke="RED"/>

	    <path d="M 10 10  V 10 H 150 Z " fill="transparent" stroke="BLUE"/>

	  </svg>
	 
	 <?php }?>
	 
	
	
	
	



</div>
</FORM>
</main>
</body>
</html>
<?php
mysqli_close($mysql);
?>

