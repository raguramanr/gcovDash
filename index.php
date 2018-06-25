<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="icon" href="images/extreme.png" type="image/x-icon" />
  <title>GCOV Dashboard</title>
  <link rel="stylesheet" type="text/css" href="gcov.css">
</head>
<body>
<form method="post" action="<?php echo $PHP_SELF?>">

<?php
include 'procs.php';
#########################################################################################
#                                                                                       #
# Function to Handle the Function Search Function Button in Dashboard			#
#                                                                                       #
#########################################################################################
if(isset($_POST["searchFunction"]) || $_GET[searchFunction] == "yes") {
$sortParameter="gcov_runType";
if($_GET[sort]=="yes") {
    $sortParameter=$_GET[sortBy];
    $_REQUEST[searchFunction] = $_GET[gcov_fnName];
}
$fnNames = array_filter(preg_split('/[\;,\s]+/', $_REQUEST[searchFunction]));
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">Search Function</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"35%\"></td>";
            echo "<td width=\"10%\" class=\"headerItem\">Function Search</td>";
            echo "<td width=\"15%\"><input type=\"text\" name=\"searchFunction\"></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">Function Name: </td>";
            echo "<td class=\"headerValue\">$_REQUEST[searchFunction]</td>";
            echo "<td></td>";
            echo "<td class=\"\"></td>";
            echo "<td class=\"\"><center></td>";
            echo "<td class=\"\"><center></td>";
            echo "<td class=\"\"><center></td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"80%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"10%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"30%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">Regression Run<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_runType\"><img src=\"images/glass.png\" width=10 height=14 alt=\"Sort by Run\" title=\"Sort by Run\" border=0></span></td>";
      echo "<td class=\"tableHead\">EXOS Version<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_exosVersion\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Image Type<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_imageType\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Image Type\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Build&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_exosBuild\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Date created<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_dateCreated\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functionality<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_functionality\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Feature<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_feature\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">GCDA File<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_gcdaFile\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Name<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_fnName\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Function Name\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Coverage<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_fnCoverage*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Lines<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?searchFunction=yes&gcov_fnName=$_REQUEST[searchFunction]&sort=yes&sortBy=gcov_fnLines*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';

    $sql = "SELECT  gcov_runType, gcov_exosVersion, gcov_exosBuild, gcov_dateCreated, gcov_imageType, gcov_functionality, gcov_feature, gcov_gcdaFile, gcov_fnCoverage, gcov_fnLines, gcov_fnName
                        FROM gcov
			WHERE gcov_fnName IN (" . "'" . implode('\',\'', $fnNames) . "'". ") ORDER by $sortParameter ASC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
            if ($row[gcov_fnCoverage] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($row[gcov_fnCoverage] > 74 && $row[gcov_fnCoverage] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
	 
          echo "<tr>";
          echo "<td class=coverFile>$row[gcov_runType]</a></td>";
          echo "<td class=coverFile>$row[gcov_exosVersion]</a></td>";
          echo "<td class=coverFile>$row[gcov_imageType]</a></td>";
          echo "<td class=coverFile>$row[gcov_exosBuild]</a></td>";
          echo "<td class=coverFile>$row[gcov_dateCreated]</a></td>";
          echo "<td class=coverFile>$row[gcov_functionality]</a></td>";
          echo "<td class=coverFile>$row[gcov_feature]</a></td>";
          echo "<td class=coverFile>$row[gcov_gcdaFile]</a></td>";
          echo "<td class=coverFile>$row[gcov_fnName]</a></td>";
          echo "<td class=\"$tableClass\"><center>$row[gcov_fnCoverage] %</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_fnLines]</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>Function <font color=red>".$_REQUEST[searchFunction]." </font>not found in Database<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();
  exit;

}

#########################################################################################
#                                                                                       #
# Function to print the main Dashboard							#
#                                                                                       #
#########################################################################################
function printgcovDash() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"10%\" class=\"headerValue\">Dashboard</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"35%\"></td>";
            echo "<td width=\"10%\" class=\"headerItem\">Function Search</td>";
	    echo "<td width=\"15%\"><input type=\"text\" name=\"searchFunction\"></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">Info:</td>";
            echo "<td class=\"headerValue\">all.Run.info</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"35%\"></td>";
            echo "<td width=\"15%\"></td>";
            echo "<td width=\"10%\"class=\"headerValue\"></td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"80%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"20%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">Regression Run<span class=\"tableHeadSort\"><img src=\"images/glass.png\" width=10 height=14 alt=\"Sort by Run\" title=\"Sort by Run\" border=0></span></td>";
      echo "<td class=\"tableHead\">EXOS Version<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_exosVersion\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Image Type<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_imageType\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Image Type\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Build<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_exosBuild\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Date created<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_dateCreated\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Total Functions<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_functionCount\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functions Called<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_functionCalled\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Call Percent<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?&sort=yes&sortBy=gcov_calledPercent\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Percent\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_runType";
    if($_GET[sort]=="yes") {
       $sortParameter=$_GET[sortBy];
    }

    $sql = "SELECT  gcov_runType,   
			gcov_exosVersion,   
			gcov_exosBuild,  
			gcov_dateCreated,  
			gcov_imageType,
			count(gcov_fnName) as gcov_functionCount, 
			sum(IF(gcov_fnCoverage=0, '0', '1')) as gcov_functionCalled, 
			ROUND((sum(IF(gcov_fnCoverage=0, '0', '1'))/count(gcov_fnName))*100, 2) as gcov_calledPercent 
			FROM gcov 
			group by gcov_runType, 
			gcov_exosVersion,
			gcov_exosBuild,
			gcov_dateCreated
			ORDER by $sortParameter ASC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
   	 if ($row[gcov_calledPercent] <= 74) {
	 	$tableClass="coverPerLo";
	 } elseif ($row[gcov_calledPercent] > 74 && $row[gcov_calledPercent] < 100) {
	 	$tableClass="coverPerMed";
	 } else {
	 	$tableClass="coverPerHi";
	 }
	 
          echo "<tr>";
          echo "<td class=headerCovDashboardEntry><a href=\"$PHP_SELF?showFunctionality=yes&gcov_runType=$row[gcov_runType]&gcov_exosVersion=$row[gcov_exosVersion]&gcov_imageType=$row[gcov_imageType]&gcov_exosBuild=$row[gcov_exosBuild]&gcov_dateCreated=$row[gcov_dateCreated]&gcov_functionCount=$row[gcov_functionCount]&gcov_functionCalled=$row[gcov_functionCalled]&gcov_calledPercent=$row[gcov_calledPercent]\">$row[gcov_runType]</a></td>";
          echo "<td class=headerCovDashboardEntry>$row[gcov_exosVersion]</td>";
          echo "<td class=headerCovDashboardEntry>$row[gcov_imageType]</td>";
          echo "<td class=headerCovDashboardEntry>$row[gcov_exosBuild]</td>";
          echo "<td class=headerCovDashboardEntry>$row[gcov_dateCreated]</td>";
          echo "<td class=headerCovDashboardEntry>$row[gcov_functionCount]</td>";
          echo "<td class=headerCovDashboardEntry>$row[gcov_functionCalled]</td>";
          echo "<td class=$tableClass><center>$row[gcov_calledPercent] %</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();

}

#########################################################################################
#                                                                                       #
# Function to the Functionality Wise Details						#
#                                                                                       #
#########################################################################################
function printFunctionalDetails() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">Functionality</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"15%\"></td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Total Functions</td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Functions Called</td>";
            echo "<td width=\"15%\" class=\"headerCovTableHead\">Call Percentage</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">Run Type:</td>";
            echo "<td class=\"headerValue\">$_GET[gcov_runType]</td>";
            echo "<td></td>";
            echo "<td class=\"headerItem\">Summary:</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCount]</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCalled]</td>";
            if ($_GET[gcov_calledPercent] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($_GET[gcov_calledPercent] > 74 && $_GET[gcov_calledPercent] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
            echo "<td class=\"$tableClass\"><center>$_GET[gcov_calledPercent] %</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Build:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_exosBuild]</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Date Created:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_dateCreated]</td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"50%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"20%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">Functionality<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionality=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionality\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functionality\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Total Functions<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionality=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionCount\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functions Called<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionality=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionCalled\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Call Percent<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionality=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_calledPercent\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Percent\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_functionality";
    if($_GET[sort]=="yes") {
       $sortParameter=$_GET[sortBy];
    }
    $sql = "SELECT  gcov_functionality,  
                        count(gcov_fnName) as gcov_functionCount,
                        sum(IF(gcov_fnCoverage=0, '0', '1')) as gcov_functionCalled,
                        ROUND((sum(IF(gcov_fnCoverage=0, '0', '1'))/count(gcov_fnName))*100, 2) as gcov_calledPercent
                        FROM gcov
			WHERE gcov_runType='$_GET[gcov_runType]' AND gcov_exosVersion='$_GET[gcov_exosVersion]' AND gcov_imageType='$_GET[gcov_imageType]' AND gcov_exosBuild='$_GET[gcov_exosBuild]' AND gcov_dateCreated='$_GET[gcov_dateCreated]'
                        group by gcov_functionality
			ORDER by $sortParameter ASC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
   	 if ($row[gcov_calledPercent] <= 74) {
	 	$tableClass="coverPerLo";
	 } elseif ($row[gcov_calledPercent] > 74 && $row[gcov_calledPercent] < 100) {
	 	$tableClass="coverPerMed";
	 } else {
	 	$tableClass="coverPerHi";
	 }
	 
          echo "<tr>";
          echo "<td class=coverFile><a href=\"$PHP_SELF?showFeature=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$row[gcov_functionality]&gcov_functionCount=$row[gcov_functionCount]&gcov_functionCalled=$row[gcov_functionCalled]&gcov_calledPercent=$row[gcov_calledPercent]\">$row[gcov_functionality]</a></td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_functionCount]</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_functionCalled]</td>";
          echo "<td class=$tableClass>$row[gcov_calledPercent] %</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();

}

#########################################################################################
#                                                                                       #
# Function to the Feature Wise Details							#
#                                                                                       #
#########################################################################################
function printFeatureDetails() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">Feature</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"15%\"></td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Total Functions</td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Functions Called</td>";
            echo "<td width=\"15%\" class=\"headerCovTableHead\">Call Percentage</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">Function:</td>";
            echo "<td class=\"headerValue\">$_GET[gcov_runType]/$_GET[gcov_functionality]</td>";
            echo "<td></td>";
            echo "<td class=\"headerItem\">Summary:</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCount]</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCalled]</td>";
            if ($_GET[gcov_calledPercent] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($_GET[gcov_calledPercent] > 74 && $_GET[gcov_calledPercent] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
            echo "<td class=\"$tableClass\"><center>$_GET[gcov_calledPercent] %</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Build:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_exosBuild]</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Date Created:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_dateCreated]</td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"50%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"20%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">Feature<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFeature=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_feature\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Feature\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Total Functions<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFeature=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionCount\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functions Called<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFeature=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionCalled\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Call Percent<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFeature=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_calledPercent\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Percent\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_feature";
    if($_GET[sort]=="yes") {
       $sortParameter=$_GET[sortBy];
    }

    $sql = "SELECT  gcov_feature,  
                        count(gcov_fnName) as gcov_functionCount,
                        sum(IF(gcov_fnCoverage=0, '0', '1')) as gcov_functionCalled,
                        ROUND((sum(IF(gcov_fnCoverage=0, '0', '1'))/count(gcov_fnName))*100, 2) as gcov_calledPercent
                        FROM gcov
			WHERE gcov_runType='$_GET[gcov_runType]' AND gcov_exosVersion='$_GET[gcov_exosVersion]' AND gcov_imageType='$_GET[gcov_imageType]' AND gcov_exosBuild='$_GET[gcov_exosBuild]' AND gcov_dateCreated='$_GET[gcov_dateCreated]' AND gcov_functionality='$_GET[gcov_functionality]'
                        group by gcov_feature 
			ORDER by $sortParameter ASC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
   	 if ($row[gcov_calledPercent] <= 74) {
	 	$tableClass="coverPerLo";
	 } elseif ($row[gcov_calledPercent] > 74 && $row[gcov_calledPercent] < 100) {
	 	$tableClass="coverPerMed";
	 } else {
	 	$tableClass="coverPerHi";
	 }
	 
          echo "<tr>";
          echo "<td class=coverFile><a href=\"$PHP_SELF?showgcdaFile=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$row[gcov_feature]&gcov_functionCount=$row[gcov_functionCount]&gcov_functionCalled=$row[gcov_functionCalled]&gcov_calledPercent=$row[gcov_calledPercent]\">$row[gcov_feature]</a></td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_functionCount]</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_functionCalled]</td>";
          echo "<td class=$tableClass>$row[gcov_calledPercent] %</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();

}

#########################################################################################
#                                                                                       #
# Function to the Details of Specific GCDA File						#
#                                                                                       #
#########################################################################################
function printgcdaDetails() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">GCDA</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"15%\"></td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Total Functions</td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Functions Called</td>";
            echo "<td width=\"15%\" class=\"headerCovTableHead\">Called Percentage</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">Feature</td>";
            echo "<td class=\"headerValue\">$_GET[gcov_runType]/$_GET[gcov_functionality]/$_GET[gcov_feature]</td>";
            echo "<td></td>";
            echo "<td class=\"headerItem\">Summary:</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCount]</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCalled]</td>";
	    if ($_GET[gcov_calledPercent] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($_GET[gcov_calledPercent] > 74 && $_GET[gcov_calledPercent] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
            echo "<td class=\"$tableClass\"><center>$_GET[gcov_calledPercent] %</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Build:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_exosBuild]</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Date Created:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_dateCreated]</td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"50%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"40%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">GCDA File<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showgcdaFile=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_gcdaFile\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by GCDA File\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Total Functions<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showgcdaFile=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionCount\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functions Called<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showgcdaFile=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_functionCalled\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Call Percent<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showgcdaFile=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_calledPercent\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Percent\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_gcdaFile";
    if($_GET[sort]=="yes") {
       $sortParameter=$_GET[sortBy];
    }

    $sql = "SELECT  gcov_gcdaFile,  
                        count(gcov_fnName) as gcov_functionCount,
                        sum(IF(gcov_fnCoverage=0, '0', '1')) as gcov_functionCalled,
                        ROUND((sum(IF(gcov_fnCoverage=0, '0', '1'))/count(gcov_fnName))*100, 2) as gcov_calledPercent
                        FROM gcov
			WHERE gcov_runType='$_GET[gcov_runType]' AND gcov_exosVersion='$_GET[gcov_exosVersion]' AND gcov_imageType='$_GET[gcov_imageType]' AND gcov_exosBuild='$_GET[gcov_exosBuild]' AND gcov_dateCreated='$_GET[gcov_dateCreated]' and gcov_functionality='$_GET[gcov_functionality]' AND gcov_feature='$_GET[gcov_feature]'
			GROUP BY gcov_gcdaFile
			ORDER by $sortParameter ASC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
   	 if ($row[gcov_calledPercent] <= 74) {
	 	$tableClass="coverPerLo";
	 } elseif ($row[gcov_calledPercent] > 74 && $row[gcov_calledPercent] < 100) {
	 	$tableClass="coverPerMed";
	 } else {
	 	$tableClass="coverPerHi";
	 }
	 
          echo "<tr>";
          echo "<td class=coverFile><a href=\"$PHP_SELF?showFunctions=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_gcdaFile=$row[gcov_gcdaFile]&gcov_functionCount=$row[gcov_functionCount]&gcov_functionCalled=$row[gcov_functionCalled]&gcov_calledPercent=$row[gcov_calledPercent]\">$row[gcov_gcdaFile]</a></td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_functionCount]</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_functionCalled]</td>";
          echo "<td class=$tableClass>$row[gcov_calledPercent] %</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();

}

#########################################################################################
#                                                                                       #
# Function to print the Function List from each GCDA File				#
#                                                                                       #
#########################################################################################
function printFunctionDetails() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">Functions</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"15%\"></td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Total Functions</td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\">Functions Called</td>";
            echo "<td width=\"15%\" class=\"headerCovTableHead\">Called Percentage</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">GCDA File: </td>";
            echo "<td class=\"headerValue\">$_GET[gcov_runType]/$_GET[gcov_functionality]/$_GET[gcov_feature]$_GET[gcov_gcdaFile]</td>";
            echo "<td></td>";
            echo "<td class=\"headerItem\">Summary:</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCount]</td>";
            echo "<td class=\"headerCovTableEntry\"><center>$_GET[gcov_functionCalled]</td>";
            if ($_GET[gcov_calledPercent] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($_GET[gcov_calledPercent] > 74 && $_GET[gcov_calledPercent] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
            echo "<td class=\"$tableClass\"><center>$_GET[gcov_calledPercent] %</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Build:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_exosBuild]</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Date Created:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_dateCreated]</td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"50%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"40%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">GCDA File<span class=\"tableHeadSort\"><img src=\"images/glass.png\" width=10 height=14 alt=\"Sort by Run\" title=\"Sort by dirpath\" border=0></span></td>";
      echo "<td class=\"tableHead\">Function Name<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctions=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_fnName\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Coverage<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctions=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_fnCoverage*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Lines<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctions=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_functionality=$_GET[gcov_functionality]&gcov_feature=$_GET[gcov_feature]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_functionCount=$_GET[gcov_functionCount]&gcov_functionCalled=$_GET[gcov_functionCalled]&gcov_calledPercent=$_GET[gcov_calledPercent]&sort=yes&sortBy=gcov_fnLines*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Percent\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_fnCoverage*1 DESC";
    if($_GET[sort]=="yes") {
       $sortParameter="$_GET[sortBy] ASC";
    }

    $sql = "SELECT  gcov_fnName,  
			gcov_fnCoverage,
			gcov_fnLines
                        FROM gcov
			WHERE gcov_runType='$_GET[gcov_runType]' AND gcov_exosVersion='$_GET[gcov_exosVersion]' AND gcov_imageType='$_GET[gcov_imageType]' AND gcov_exosBuild='$_GET[gcov_exosBuild]' AND gcov_dateCreated='$_GET[gcov_dateCreated]' and gcov_functionality='$_GET[gcov_functionality]' AND gcov_feature='$_GET[gcov_feature]' AND gcov_gcdaFile='$_GET[gcov_gcdaFile]'
			ORDER BY $sortParameter";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
            if ($row[gcov_fnCoverage] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($row[gcov_fnCoverage] > 74 && $row[gcov_fnCoverage] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
	 
          echo "<tr>";
          echo "<td class=coverFile>$_GET[gcov_gcdaFile]</a></td>";
          echo "<td class=coverFile><a href=\"$PHP_SELF?getFunctionName=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_fnName=$row[gcov_fnName]\">$row[gcov_fnName]</a></td>";
          echo "<td class=\"$tableClass\"><center>$row[gcov_fnCoverage] %</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_fnLines]</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();

}


#########################################################################################
#                                                                                       #
# Function to print the function usage across the specified Run 			#
#                                                                                       #
#########################################################################################
function printGetFunctionName() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">Function Usage</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"15%\"></td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\"></td>";
            echo "<td width=\"10%\" class=\"headerCovTableHead\"></td>";
            echo "<td width=\"15%\" class=\"headerCovTableHead\"></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\">Run Type/Function Name: </td>";
            echo "<td class=\"headerValue\">$_GET[gcov_runType]/$_GET[gcov_fnName]</td>";
            echo "<td></td>";
            echo "<td class=\"\"></td>";
            echo "<td class=\"\"><center></td>";
            echo "<td class=\"\"><center></td>";
            echo "<td class=\"\"><center></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Build:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_exosBuild]</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Date Created:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">$_GET[gcov_dateCreated]</td>";
          echo "</tr>";
          echo "<tr><td><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";

    echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr>";
  echo "</table>";

  echo "<center>";
  echo "<table width=\"50%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"40%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">GCDA File<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?getFunctionName=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_fnName=$_GET[gcov_fnName]&sort=yes&sortBy=gcov_gcdaFile\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Run\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Name<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?getFunctionName=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_fnName=$_GET[gcov_fnName]&sort=yes&sortBy=gcov_fnName\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Function Name\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Coverage<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?getFunctionName=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_fnName=$_GET[gcov_fnName]&sort=yes&sortBy=gcov_fnCoverage*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Function Coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Lines<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?getFunctionName=yes&gcov_runType=$_GET[gcov_runType]&gcov_exosVersion=$_GET[gcov_exosVersion]&gcov_imageType=$_GET[gcov_imageType]&gcov_exosBuild=$_GET[gcov_exosBuild]&gcov_dateCreated=$_GET[gcov_dateCreated]&gcov_gcdaFile=$_GET[gcov_gcdaFile]&gcov_fnName=$_GET[gcov_fnName]&sort=yes&sortBy=gcov_fnLines*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Function Lines\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_fnCoverage*1 DESC";
    if($_GET[sort]=="yes") {
       $sortParameter="$_GET[sortBy] ASC";
    }

    $sql = "SELECT  gcov_gcdaFile,  
			gcov_fnName,
			gcov_fnCoverage,
			gcov_fnLines
                        FROM gcov
			WHERE gcov_runType='$_GET[gcov_runType]' AND gcov_exosVersion='$_GET[gcov_exosVersion]' AND gcov_imageType='$_GET[gcov_imageType]' AND gcov_exosBuild='$_GET[gcov_exosBuild]' AND gcov_dateCreated='$_GET[gcov_dateCreated]' AND gcov_fnName='$_GET[gcov_fnName]'
			GROUP BY gcov_gcdaFile ORDER BY $sortParameter";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
            if ($row[gcov_fnCoverage] <= 74) {
                $tableClass="headerCovTableEntryLo";
            } elseif ($row[gcov_fnCoverage] > 74 && $row[gcov_fnCoverage] < 100) {
                $tableClass="headerCovTableEntryMed";
            } else {
                $tableClass="headerCovTableEntryHi";
            }
	 
          echo "<tr>";
          echo "<td class=coverFile>$row[gcov_gcdaFile]</a></td>";
          echo "<td class=coverFile>$row[gcov_fnName]</a></td>";
          echo "<td class=\"$tableClass\"><center>$row[gcov_fnCoverage] %</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_fnLines]</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();

}

#########################################################################################
#                                                                                       #
# Default EXOS Set to EXOS 22.4.1, otherwise clicked different link                     #
#                                                                                       #
#########################################################################################
if($_GET[showgcdaFile] == "yes") {
      printgcdaDetails();
} elseif ($_GET[showFunctionality] == "yes") {
      printFunctionalDetails();
} elseif ($_GET[showFeature] == "yes") {
      printFeatureDetails();
} elseif ($_GET[showFunctions] == "yes") {
      printFunctionDetails();
} elseif ($_GET[getFunctionName] == "yes") {
      printGetFunctionName();
} else {
      printgcovDash();
      
}
?>
