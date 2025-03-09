<?php 
include("db.php");      
//Create and populate a variable called $pagename
$pagename = "Make Your Home Smart";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
echo "<body>"; 
include ("headfile.html");     
echo "<h4>".$pagename."</h4>";    
//Call in stylesheet 
//display name of the page as window title 
//include header layout file  
//display name of the page on the web page 
//display random text 

$SQL = "SELECT prodid, prodName, prodPicNameSmall, prodDescripShort, prodPrice FROM products";

$exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));

echo "<table style = 'border :0px'>";
while ($arrayp=mysqli_fetch_array($exeSQL)) // this lines fetches a row from the result set in $exeSQL(which contained the records return from $SQL query). Thiswhile loops returns the rows as assocaitive array like column names are the keys and corresponding data like row's data
{ 
 echo "<tr>"; 
 echo "<td style='border: 0px'>"; 
 //display the small image whose name is contained in the array 
 echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodid'].">";
 echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
 echo  "</a>";
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array 
 echo "<p>".$arrayp['prodDescripShort'];
 echo "<p>&pound".$arrayp['prodPrice'];
 echo "</td>"; 
 echo "</tr>"; 
} 
echo "</table>";   

include("footfile.html");     
echo "</body>"; 
?> 