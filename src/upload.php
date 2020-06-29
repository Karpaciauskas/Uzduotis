<?php
  include 'functions.php';
  ///Including functions
  if($_FILES["fileToUpload"]["size"]>0) {
    ///Checking if file was uploaded
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $contents = file_get_contents($_FILES['fileToUpload']['tmp_name']);
    $handle  = fopen($_FILES["fileToUpload"]["tmp_name"], "r");
    ///Setting variables
    if($FileType != "csv" && $FileType != "xml" && $FileType != "json") {
      ///Checking if file is in valid file type
      echo "Only CSV,XML and JSON files allowed";
    }
    else {
      echo "File ". $target_file . " information has been imported to the table:";
      headerTable();
      ///Creating table header
      switch($FileType){
      case "csv": 
        ///Checking if file type is CSV
        csvTable($handle);
        break;
      case "json":
        ///Checking if file type is JSON
        jsonTable($contents);
        break;
      case "xml":
      ///Checking if file type is XML
        xmlTable($contents);
        break;
    }?>
    </tbody>
    </table>
    <?php
    }
  }
  else echo "No file was uploaded";
?>
 