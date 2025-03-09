<?php 
include("db.php");
$pagename="A smart buy for a smart home";      
//Create and populate a variable called $pagename 
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


//retrieve the product id from previuos page using GET method and $_GET super Global variable
//applied to the query string in 'u_pro_id' to proid
$proid = $_GET['u_prod_id'];

echo "<p>Selected Product ID ".$proid." ";


//Create SQL variable and populate is with sql statement that retrieve details for selected product
$SQL = "SELECT prodid, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity FROM products WHERE prodid=".$proid;

//Execute the sql query using the database connection and check errors ,if query fail shows an error
$exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));

echo "<table style = 'border :0px'>";

$arrayp=mysqli_fetch_array($exeSQL);
echo "<tr>"; 
echo "<td style='border: 0px'>"; 
// Display the image whose name is contained in the array 
echo "<a href=prodbuy.php?u_prod_id=" . $arrayp['prodid'] . ">"; 	// Using query string to append the prodid to URL to get prodid by GET method in prodbuy.php
echo "<img src=images/" . $arrayp['prodPicNameLarge'] . " height=350 width=350>";
echo  "</a>";
echo "</td>"; 

echo "<td style='border: 0px'>"; 
echo "<p style='margin-bottom: 10px;'><h5>" . $arrayp['prodName'] . "</h5></p>"; // Display product name with margin
echo "<p style='margin-bottom: 10px;'>" . $arrayp['prodDescripLong'] . "</p>"; // Display product description with margin
echo "<p style='margin-bottom: 10px;'>&pound;" . $arrayp['prodPrice'] . "</p>"; // Display product price with margin
echo "<p style='margin-bottom: 10px;'>Left in stock: " . $arrayp['prodQuantity'] . "</p>"; // Display stock quantity with margin

echo "<br><p>Number to be purchased: "; 

//create a form for user to enter quantity of product that user wants.
//The value will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>"; 

echo "<SELECT name = p_quantity>";

for($i=1; $i<=$arrayp['prodQuantity'];$i++){
	echo "<option value=".$i.">".$i."</option>";
}
echo "</SELECT>";

echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>"; 
//pass the product id to the next page basket.php as a hidden value 
echo "<input type=hidden name=h_prodid value=".$proid.">"; 
echo "</form>"; 
echo "</p>"; 

echo "</td>"; 
echo "</tr>"; 
echo "</table>";  



include("footfile.html");     
echo "</body>"; 
?> 