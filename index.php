<?php
include_once "db_config.php";

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id"); // using mysqli_query instead
?>
<html>
<head>	
	<title>Simple CRUD</title>

    <script type="text/javascript" src="includes/jQuery.js"></script>
    <script type="text/javascript" src="includes/ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="includes/ui/jquery-ui.css">

    <script type="text/javascript" src="includes/jqScripts.js" defer></script>
    <link rel="stylesheet" href="includes/style.css" type="text/css"/>
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
            <!--row-->
        </div>


        <?php
        while($res = mysqli_fetch_array($result)) {
            echo "<div class=\"drow\" id='row-".$res['id']."'>";
                echo "<div class=\"dcell\" id='c1'>".$res['id']."</div>";
                echo "<div class=\"dcell\" id='c2'>".$res['name']."</div>";
                echo "<div class=\"dcell\" id='c3'>".$res['age']."</div>";
                echo "<div class=\"dcell\" id='c4'>".$res['email']."</div>";
                echo "<div class='dcell' id='c5'><button id=\"edit\">Edit</button> <button id=\"delete\">Delete</button></div>";
            echo "<!--row--></div>";
        }?>


        <div class="drow" id="adder" align="center">
            <!--row-->
        </div>



        <div class="drow">
            <div class="dcell"></div>
            <div class="dcell"></div>
            <div class="dcell"></div>
            <div class="dcell"></div>
            <div class="dcell"><button id="add">Add</button></div>
            <!--row-->
        </div>


        <!--table-->
	</div>



<div id="confirm" title="Confirm the deleting">
    <p>Are you sure you want to delete this element?</p>
</div>
</body>
</html>
