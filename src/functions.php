<?php
  function csvTable($handle){
    ///CSV data table printing function
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

  function jsonTable($contents){
    ///JSON data table printing function
    $json = json_decode($contents); 
        foreach($json as $key => $item): ?>
          <tr>
            <td><?php echo $item->first_name; ?></td>
            <td><?php echo $item->age; ?></td>
            <td><?php echo $item->gender; ?></td>
          </tr>
          <?php endforeach; 
  }

  function xmlTable($contents){
    ///XML data table printing function
    $xml = simplexml_load_string($contents); 
        foreach ($xml as $item) : ?>
          <tr>
            <td><?php echo $item->first_name; ?></td>
            <td><?php echo $item->age; ?></td>
            <td><?php echo $item->gender; ?></td>
          </tr>
          <?php endforeach; 
  }

  function headerTable(){
    ///Table header printing function
    ?><table class="table">
    <thead>
      <tr>
        <th>First Name</td>
        <th>Age</td>
        <th>Gender</td>
      </tr>
    </thead>
  <tbody><?php
  }
?>
