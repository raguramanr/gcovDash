<?php
#########################################################################################
#                                                                                       #
# Function to print the Header  Table and HTML Tags                                     #
#                                                                                       #
#########################################################################################
function printHeader() {
  $url=strtok($_SERVER[REQUEST_URI],'?');
  echo "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
    echo "<tr><td class=\"title\">GCOV - Function coverage report</td></tr>";
    #echo "<tr><td class=\"title\"><a href=\"$url\" style=\"text-decoration:none\">GCOV - Function coverage report</a></td></tr>";
    echo "<tr><td class=\"ruler\"><img src=\"glass.png\" width=3 height=3 alt=\"\"></td></tr>";
    echo "<tr>";
}

#########################################################################################
#                                                                                       #
# Function to print the Footer Table and HTML Close Tags                                #
#                                                                                       #
#########################################################################################
function printFooter() {
  echo "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
    echo "<tr><td class=\"ruler\"><img src=\"glass.png\" width=3 height=3 alt=\"\"></td></tr>";
    echo "<tr><td><center><a href=\"#\" onclick=\"history.go(-1)\">[Previous Page]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"search.php\">[Advanced Search]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php\">[Home]</td></tr>";
    echo "<tr><td class=\"versionInfo\">Page Maintained by: ENI-SQA</td></tr>";
  echo "</table>";
  echo "</body>";
  echo "</html>";
  echo "<br>";
}

#########################################################################################
#                                                                                       #
# Function to return the query output in a array					#
#                                                                                       #
#########################################################################################
function queryDB($conn,$sql) {
$value = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
      $value[] = $row;
   }
} else {
    echo "0 records found";
}
return $value;
}

#########################################################################################
#                                                                                       #
# Function to print the function usage across the specified Run                         #
#                                                                                       #
#########################################################################################
function printFunctionUsage($gcov_fnName) {
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
            echo "<td class=\"headerValue\">$gcov_fnName</td>";
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
  echo "<table width=\"50%\" cellpadding=1 cellspacing=1 border=0>";

    echo "<tr>";
      echo "<td width=\"40%\"><br></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
      echo "<td width=\"10%\"></td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td class=\"tableHead\">Regression Run<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_runType\"><img src=\"images/glass.png\" width=10 height=14 alt=\"Sort by Run\" title=\"Sort by Run\" border=0></span></td>";
      echo "<td class=\"tableHead\">EXOS Version<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_exosVersion\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Image Type<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_imageType\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Image Type\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Build&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_exosBuild\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Date created<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_dateCreated\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by line coverage\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Functionality<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_functionality\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by total Functions\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Feature<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_feature\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">GCDA File<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_gcdaFile\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Name<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_fnName\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Function Name\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Coverage<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_fnCoverage*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
      echo "<td class=\"tableHead\">Function Lines<span class=\"tableHeadSort\"><a href=\"$PHP_SELF?showFunctionDetail=yes&gcov_fnName=$gcov_fnName&sort=yes&sortBy=gcov_fnLines*1\"><img src=\"images/updown.png\" width=10 height=14 alt=\"\" title=\"Sort by Functions Called\" border=0></a></span></td>";
    echo "</tr>";

    include 'db_connect.php';
    $sortParameter="gcov_fnCoverage*1 DESC";
    if($_GET[sort]=="yes") {
       $sortParameter="$_GET[sortBy] ASC";
    }

    $sql = "SELECT * FROM gcov
                        WHERE gcov_fnName='$gcov_fnName'
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
      echo "<br><br><center><b>0 Records found<br><br></center>";
    }

  echo "</table>";
  echo "</center>";
  echo "<br><br>";
  printFooter();
  exit;

}


?>
