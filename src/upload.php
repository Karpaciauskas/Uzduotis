<?php
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
      ?><table class="table">
          <thead>
            <tr>
              <th>First Name</td>
              <th>Age</td>
              <th>Gender</td>
            </tr>
          </thead>
        <tbody><?php
      ///Creating table header
      if($FileType == "csv") { 
      ///Checking if file type is CSV
        fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== false) { ?>
          <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
          </tr><?php 
        }
        fclose($handle); 
      }
      if($FileType == "json") {
      ///Checking if file type is JSON
        $json = json_decode($contents); 
        foreach($json as $key => $item): ?>
          <tr>
            <td><?php echo $item->first_name; ?></td>
            <td><?php echo $item->age; ?></td>
            <td><?php echo $item->gender; ?></td>
          </tr>
          <?php endforeach; 
      }
      if($FileType == "xml") {
      ///Checking if file type is XML
        $xml = simplexml_load_string($contents); 
        foreach ($xml as $item) : ?>
          <tr>
            <td><?php echo $item->first_name; ?></td>
            <td><?php echo $item->age; ?></td>
            <td><?php echo $item->gender; ?></td>
          </tr>
          <?php endforeach; 
      }?>
      </tbody>
      </table>
      <?php
    }
  }
  else echo "No file was uploaded";
?>
 