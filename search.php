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
# Function to Handle the Basic Search Function Button in Dashboard			#
#                                                                                       #
#########################################################################################
if(isset($_POST["functionSearch"]) || $_GET[searchFunction] == "yes") {
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
            echo "<td width=\"10%\"></td>";
            echo "<td width=\"15%\"></td>";
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
    $sql = "SELECT  gcov_runType, gcov_exosVersion, gcov_exosBuild, gcov_dateCreated, gcov_imageType, gcov_functionality, gcov_feature, gcov_gcdaFile, gcov_fnCoverage, gcov_fnLines, gcov_fnName FROM gcov WHERE gcov_fnName IN (" . "'" . implode('\',\'', $fnNames) . "'". ") ORDER by $sortParameter ASC";
    #echo $sql;

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
# Function to Handle the Advance Search Function Button in Dashboard                    #
#                                                                                       #
#########################################################################################
if(isset($_POST["advancedeSearch"]) || $_GET[advancedsearchFunction] == "yes") {
$sortParameter="gcov_runType";

$searchQuery = array();
  if ($_POST[gcov_runType] != "" ) {
	$searchQuery[] = "gcov_runType IN ('". implode('\',\'', $_POST[gcov_runType]). "')";
  } 
  if ($_POST[gcov_exosVersion] != "" ) {
	$searchQuery[] = "gcov_exosVersion IN ('". implode('\',\'', $_POST[gcov_exosVersion]). "')";
  } 
  if ($_POST[gcov_exosBuild] != "" ) {
	$searchQuery[] = "gcov_exosBuild IN ('". implode('\',\'', $_POST[gcov_exosBuild]). "')";
  } 
  if ($_POST[gcov_dateCreated] != "" ) {
	$searchQuery[] = "gcov_dateCreated IN ('". implode('\',\'', $_POST[gcov_dateCreated]). "')";
  } 
  if ($_POST[gcov_imageType] != "" ) {
	$searchQuery[] = "gcov_imageType IN ('". implode('\',\'', $_POST[gcov_imageType]). "')";
  } 
  if ($_POST[gcov_functionality] != "" ) {
	$searchQuery[] = "gcov_functionality IN ('". implode('\',\'', $_POST[gcov_functionality]). "')";
  } 
  if ($_POST[gcov_feature] != "" ) {
	$searchQuery[] = "gcov_feature IN ('". implode('\',\'', $_POST[gcov_feature]). "')";
  } 
  #if ($_POST[gcov_fnName] != "" ) {
  #      $searchQuery[] = "gcov_fnName IN ('". implode('\',\'', $_POST[gcov_fnName]). "')";
  #}
$sqlSearchString = implode(' AND ', $searchQuery);

if($_GET[advancedsearchFunction]=="yes") {
    $sortParameter=$_GET[sortBy];
    $sqlSearchString = $_GET[sqlQuery];
}

 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"15%\" class=\"headerValue\">Advanced Search</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"35%\"></td>";
            echo "<td width=\"10%\"></td>";
            echo "<td width=\"15%\"></td>";
          echo "</tr>";
          echo "<tr>";
            echo "<td class=\"headerItem\"></td>";
            echo "<td class=\"headerValue\"></td>";
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
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">Regression Run<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_runType\"><img src=\"images/glass.png\" width=10 height=14 alt=\"Sort by Run\" title=\"Sort by Run\" border=0></span></td>";
      echo "<td class=\"tableHead\">EXOS Version<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_exosVersion\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Image Type<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_imageType\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Image Type\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Build&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_exosBuild\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Date created<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_dateCreated\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functionality<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sort=yes&sortBy=gcov_functionality\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Feature<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_feature\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">GCDA File<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_gcdaFile\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Name<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_fnName\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Function Name\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Coverage<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_fnCoverage*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Lines<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?advancedsearchFunction=yes&sqlQuery=$sqlSearchString&sortBy=gcov_fnLines*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php'; 
    $sql = "SELECT  gcov_runType, gcov_exosVersion, gcov_exosBuild, gcov_dateCreated, gcov_imageType, gcov_functionality, gcov_feature, gcov_gcdaFile, gcov_fnCoverage, gcov_fnLines, gcov_fnName FROM gcov WHERE $sqlSearchString ORDER by $sortParameter ASC";
    #echo $sql;

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
          echo "<td class=coverFile><a href=$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$row[gcov_fnName]>$row[gcov_fnName]</a></td>";
          echo "<td class=\"$tableClass\"><center>$row[gcov_fnCoverage] %</td>";
          echo "<td class=headerCovTableEntry><center>$row[gcov_fnLines]</td>";
          echo "</tr>";
     }
    } else {
      echo "<br><br><center><b>Query Failure. Pls redefine your query<br><br></center>";
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
function searchDash() {
 printHeader();
      echo "<td width=\"100%\">";
        echo "<table cellpadding=1 border=0 width=\"100%\">";
          echo "<tr>";
            echo "<td width=\"10%\" class=\"headerItem\">Current view:</td>";
            echo "<td width=\"10%\" class=\"headerValue\">Advanced Search</td>";
            echo "<td width=\"5%\"></td>";
            echo "<td width=\"35%\"></td>";
            echo "<td width=\"10%\"></td>";
	    echo "<td width=\"15%\"></td>";
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
      echo "<td><br></td>";
      echo "<td><br></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<tr><td width=\"100%\" colspan=2><center><b>Enter the Function Names to be searched across all runs seperated by semicolon (Ex. if_delete;if_create)</td></tr><tr>";
      echo "<td width=\"10%\" class=\"tableHead\">Function Names<font size=2><br>(Separated by ; or , or space)</font><span class=\"tableHeadSort\"><img src=\"images/glass.png\" width=10 height=14 alt=\"Sort by Run\" title=\"Sort by Run\" border=0></span></td>";
      echo "<td width=\"50%\" class=\"headerValue\"><textarea style=\"font-size: 14pt; height: 120px; width: 100%;\" size=\"100\" name=\"searchFunction\"></textarea></td></tr>";
      echo "<tr><td width=\"100%\" colspan=2><center><input type=\"Submit\" name=\"functionSearch\" value=\"Show Details\"></td>";
    echo "</tr>";

  echo "</table>";
  echo "<br>";


## Printing Search Option 2 with List Boxes
  echo "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
  echo "<tr><td class=\"ruler\"><img src=\"images/glass.png\" width=3 height=3 alt=\"\"></td></tr></table>";

  echo "<center><br>";
  echo "<table width=\"100%\" cellpadding=1 cellspacing=1 border=0>";
    echo "<tr>";
      echo "<tr><td width=\"100%\" colspan=7><center><b>Customized Search - Select the filter Parameters and Search</td></tr><tr>";
      echo "<td width=\"5%\" class=\"tableHead\">Run Type</td>";
      echo "<td width=\"5%\" class=\"tableHead\">EXOS Version<span class=\"tableHeadSort\"></td>";
      echo "<td width=\"5%\" class=\"tableHead\">EXOS Build<span class=\"tableHeadSort\"></td>";
      echo "<td width=\"5%\" class=\"tableHead\">Date Created<span class=\"tableHeadSort\"></td>";
      echo "<td width=\"5%\" class=\"tableHead\">Image Type<span class=\"tableHeadSort\"></td>";
      echo "<td width=\"8%\" class=\"tableHead\">Functionality<span class=\"tableHeadSort\"></td>";
      echo "<td width=\"10%\" class=\"tableHead\">Feature<span class=\"tableHeadSort\"></td>";
      #echo "<td width=\"20%\" class=\"tableHead\">Function Name<span class=\"tableHeadSort\"></td>";
    echo "</tr>";

    include 'db_connect.php'; 
    $runType 		= queryDB($conn,"select gcov_runType from gcov group by gcov_runType");
    $exosVersion 	= queryDB($conn,"select gcov_exosVersion from gcov group by gcov_exosVersion");
    $exosBuild 		= queryDB($conn,"select gcov_exosBuild from gcov group by gcov_exosBuild");
    $dateCreated	= queryDB($conn,"select gcov_dateCreated from gcov group by gcov_dateCreated");
    $imageType 		= queryDB($conn,"select gcov_imageType from gcov group by gcov_imageType");
    $functionality	= queryDB($conn,"select gcov_functionality from gcov group by gcov_functionality");
    $feature		= queryDB($conn,"select gcov_feature from gcov group by gcov_feature");
    #$fnName		= queryDB($conn,"select gcov_fnName from gcov group by gcov_fnName");

    echo "<tr>";

    echo "<td>";
    echo "<select name=\"gcov_runType[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($runType as $data) {
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_runType'], $data['gcov_runType']);
    }
    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select name=\"gcov_exosVersion[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($exosVersion as $data) { 
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_exosVersion'], $data['gcov_exosVersion']);
    }
    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select name=\"gcov_exosBuild[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($exosBuild as $data) {     
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_exosBuild'], $data['gcov_exosBuild']);
    }
    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select name=\"gcov_dateCreated[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($dateCreated as $data) {
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_dateCreated'], $data['gcov_dateCreated']);
    }
    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select name=\"gcov_imageType[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($imageType as $data) {
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_imageType'], $data['gcov_imageType']);
    }
    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select name=\"gcov_functionality[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($functionality as $data) {
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_functionality'], $data['gcov_functionality']);
    }
    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select name=\"gcov_feature[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    foreach($feature as $data) {
         printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_feature'], $data['gcov_feature']);
    }
    echo "</select>";
    echo "</td>";

    #echo "<td>";
    #echo "<select name=\"gcov_fnName[]\" style=\"height:200px; width:100%;\" multiple size=8>";
    #foreach($fnName as $data) {
    #     printf("<OPTION VALUE=\"%s\">%s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>\n", $data['gcov_fnName'], $data['gcov_fnName']);
    #}
    #echo "</select>";
    #echo "</td>";

    echo "</tr>";
    echo "<tr><td width=\"100%\" colspan=7><center><input type=\"Submit\" name=\"advancedeSearch\" value=\"Show Details\"></td>";

  echo "</table>";
  echo "<br>";
  echo "<br>";

  printFooter();

}


#########################################################################################
#                                                                                       #
# Default EXOS Set to EXOS 22.4.1, otherwise clicked different link                     #
#                                                                                       #
#########################################################################################
if($_GET[showFunctionDetail] == "yes") {
      printFunctionUsage($_GET[gcov_fnName]);
} else {
  searchDash();
}
?>
