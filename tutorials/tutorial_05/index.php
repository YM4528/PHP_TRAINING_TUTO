<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>

  <h1>Tutorial 05</h1>
  <h2>Content 1 : Text File</h2>
  <?php
  $file = "./sample.txt";
  $txtfile = file_get_contents($file);
  //echo $document;
  $lines = explode("\n", $txtfile);
  foreach ($lines as $newline) {
    echo '<b>' . $newline . '</b> <br>';
  }
  ?>

  <h2>Content 2 : Excel File</h2>
  <table class="excel">
    <?php
    require 'library/vendor/autoload.php';
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load("sample.xlsx");
    $worksheet = $spreadsheet->getActiveSheet();
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterate = $row->getCellIterator();
      $cellIterate->setIterateOnlyExistingCells(false);
      echo "<tr>";
      foreach ($cellIterate as $cell) {
        echo "<td>" . $cell->getValue() . "</td>";
      }
      echo "</tr>";
    }
    ?>
  </table>

  <h2>Content 3 : CVS File</h2>
  <table>
    <?php
    $start_row = 1;
    if (($csvFile = fopen("sample.csv", "r")) != FALSE) {
      while (($read_data = fgetcsv($csvFile, 1000, ",")) != FALSE) {
        $column_count = count($read_data);
        echo "<tr>";
        $start_row++;
        for ($start = 0; $start < $column_count; $start++) {
          echo "<td>" . $read_data[$start] . "</td>";
        }
        echo "</tr>";
      }
      fclose($csvFile);
    }
    ?>
  </table>

  <h2>Content 4 : Doc File</h2>
  <?php
  if ($file = fopen("sample.doc", "r")) {
    while (!feof($file)) {
      $line = fgets($file);
      echo ("$line" . "<br>");
    }
    fclose($file);
  }
  ?>
  <br>


</body>

</html>