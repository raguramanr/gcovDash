<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>LCOV - all.info</title>
  <link rel="stylesheet" type="text/css" href="gcov.css">


<script type="text/javascript">
function validateForm() {
    var x = document.forms["import"]["file"].value;
    if (x == null || x == "") {
        alert("Filename Blank. Select the CSV file to import");
        return false;
    }
}
</script>

</head>
<body>
<form name="import" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

<table width="100%" border=0 cellspacing=0 cellpadding=0>
    <tr><td class="title">GCOV - Data Import</td></tr>
    <tr><td class="ruler"><img src="glass.png" width=3 height=3 alt=""></td></tr>
</table>

<?php
include 'db_connect.php';

if(isset($_POST["submit"])) {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
          while(($filesop = fgetcsv($handle, 100000, ",")) !== false)
          {
                $gcov_runType		= $filesop[0];
                $gcov_exosVersion	= $filesop[1];
                $gcov_exosBuild		= $filesop[2];
                $gcov_dateCreated	= $filesop[3];
                $gcov_imageType		= $filesop[4];
                $gcov_functionality	= $filesop[5];
                $gcov_feature		= $filesop[6];
                $gcov_gcdaFile		= $filesop[7];
                $gcov_fnName		= $filesop[8];
                $gcov_fnCoverage	= $filesop[9];
                $gcov_fnLines		= $filesop[10];
                $gcov_fnHits		= $filesop[11];
                $gcov_remarks		= $filesop[12];

                $sql = "insert into gcov values ('',
                                                        '$gcov_runType',
                                                        '$gcov_exosVersion',
                                                        '$gcov_exosBuild',
                                                        '$gcov_dateCreated',
                                                        '$gcov_imageType',
                                                        '$gcov_functionality',
                                                        '$gcov_feature',
                                                        '$gcov_gcdaFile',
                                                        '$gcov_fnName',
                                                        '$gcov_fnCoverage',
                                                        '$gcov_fnLines',
                                                        '$gcov_fnHits',
                                                        '$gcov_remarks')";
                 #print $sql;
                 $stmt = $conn->prepare($sql);
                 $stmt->execute();
                 $c = $c + 1;
          }

        if($sql) {
                echo "<br><br><b><center>CSV Imported to Database successful. You have inserted ". $c ." records";
        } else {
                echo "<br><br><b><center>Sorry! Inserting values to database failed. Please check the details.";
        }
}
$conn->close();
?>

<br><br><center><h3>Select the file to be uploaded to database</h3>
<center><input type="file" name="file" /><br/><br> 
<center><input type="submit" name="submit" value="Submit" onclick="return validateForm()" />
</form>
</body>
</html>
