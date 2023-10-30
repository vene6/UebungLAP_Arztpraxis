<?php

function makeStatement($query, $arrayValues = null)
{
  global $conn;
  try
  {
    $stmt = $conn->prepare($query);
    $stmt->execute($arrayValues);
    return $stmt;
  }
  catch(Exception $e)
  {
    echo 'Fehler - '.$e->getCode().': '.$e->getMessage().'<br>';
  }
}

function makeTable($query, $arrayValues = null)
{
  try
  {
    $stmt = makeStatement($query, $arrayValues);
    /* Die Attributeigenschaften können über meta-Daten ermittelt werden
       z.B. Attributbezeichnung (name), Datentyp, PK usw.
    */
    $meta = array();
    echo '<table class="table">
          <tr class="tr">';
    /* Spaltenbezeichnungen ausgeben */
    for($i = 0; $i < $stmt->columnCount(); $i++)
    {
      $meta[] = $stmt->getColumnMeta($i);
      echo '<th class="th">'.$meta[$i]['name'].'</th>';
    }
    echo '</tr>';
    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
      echo '<tr class "tr">';
      foreach($row as $r) {
        echo '<td class="td">'.$r.'</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
  }
  catch(Exception $e)
  {
    echo 'Fehler - '.$e->getCode().': '.$e->getMessage().'<br>';
  }
}