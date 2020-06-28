<!DOCTYPE html>
<html>
  <body>
    <head><link rel="stylesheet" type="text/css" href="../public/css/style.css"></head>
    <form enctype="multipart/form-data" action="" method="post">
      Select data file to upload:
      <label for="selectFile" id="button">
        &#128193; Select File
      </label>
      <input id="selectFile" type="file" name="fileToUpload" id="fileToUpload">
      <label for="showData" id="button">
        &#x1F50D; Show Data
      </label>
      <input id="showData" type="submit" value="Show data" name="submit">
    </form><br>
    <?php if(isset($_POST['submit'])) include("upload.php"); ?>
  </body>
</html>