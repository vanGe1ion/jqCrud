<?php
include_once "db_config.php";

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id"); // using mysqli_query instead
?>
<html>
<head>	
	<title>Homepage</title>
    <link rel="stylesheet" href="includes/style.css" type="text/css"/>
    <script type="text/javascript" src="includes/jQuery.js"></script>
    <script type="text/javascript" defer src="includes/jqScripts.js"></script>
</head>

<body>

<br/><br/>

	<div class="dtable">


        <div class="drow" >
            <div class="hcell">id</div>
            <div class="hcell">Name</div>
            <div class="hcell">Age</div>
            <div class="hcell">Email</div>
            <div class="hcell">Update</div>
        </div><!--row-->


        <?php
        while($res = mysqli_fetch_array($result)) {
            echo "<div class=\"drow\" id='row-".$res['id']."'>";
                echo "<div class=\"dcell\" id='c1'>".$res['id']."</div>";
                echo "<div class=\"dcell\" id='c2'>".$res['name']."</div>";
                echo "<div class=\"dcell\" id='c3'>".$res['age']."</div>";
                echo "<div class=\"dcell\" id='c4'>".$res['email']."</div>";
                echo "<div class='dcell' id='c5'><input type='button' id='edit' value='Edit'> <input type='button' id='delete' value='Delete'></div>";
            echo "</div><!--row-->";
        }?>


        <div class="drow">
            <div class="dcell"></div>
            <div class="dcell"></div>
            <div class="dcell"></div>
            <div class="dcell"></div>
            <div class="dcell"><input type="button" id="add" value="Add"></div>
        </div><!--row-->


        <div class="drow" id="adder">
            <? include "includes/rowForm.html" ?>
        </div><!--row-->


	</div><!--table-->


</body>
</html>
