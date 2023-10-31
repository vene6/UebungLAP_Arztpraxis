<style>
  .form-label{
    width: 300px;
  }
  .card{
    width: 900px;
  }
  .centered{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
  }
  .centered2{
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

<form class="centered" method="POST" action="#">
  <div class="card">
    <div class="card-header">
      <h2>Patienteninfo</h2>
    </div>
    <div class="card-body">
        <div class="mb-3">
          <label for="svnr" class="form-label">Sozialversicherungs-NR<input type="svnr" class="form-control" id="svnr" name="svnr" aria-describedby="svnr" placeholder="4-stellige Zahl eingeben z.B.: 1234" pattern="\d{1,4}" required title="Bitte geben Sie eine SVNR mit bis zu vier Ziffern ein."></label>
        </div>
        <div class="mb-3">
          <label for="gbdat" class="form-label">Geburtsdatum<input type="date" class="form-control" id="gbdat" name="gbdat" aria-describedby="gbdat" placeholder="YYYY-MM-DD" required></label>
        </div>
      <h3>Behandlungszeitraum</h3>
        <div class="mb-3">
          <label for="fromdat" class="form-label">Zeitraum von<input type="date" class="form-control" id="fromdat" name="fromdat" aria-describedby="fromdat"></label>
        </div>
        <div class="mb-3">
          <label for="todat" class="form-label">Zeitraum bis<input type="date" class="form-control" id="todat" name="todat" aria-describedby="todat"></label>
        </div>
    </div>
    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Anzeigen</button>
    </div>
  </div>
</form>


<?php
if (isset($_POST["submit"])) {
  $query = "SELECT CONCAT(per_svnr, '/', per_geburt) AS Sozialversicherungsnummer,
                 CONCAT(per_nname, ' ', per_vname) AS Patient,
                 dia_name AS Diagnose, 
                 CONCAT_WS(' - ', ter_beginn, ter_ende) AS Behandlungszeitraum 
            FROM behandlungszeitraum
            JOIN person USING (per_id)
            JOIN diagnose USING (dia_id)";

  $arrayValues = array();

  $whereConditions = array();

  if (!empty($_POST['svnr'])) {
      $whereConditions[] = "per_svnr = :svnr";
      $arrayValues[':svnr'] = $_POST['svnr'];
  }

  if (!empty($_POST['gbdat'])) {
      $whereConditions[] = "per_geburt = :geburt";
      $arrayValues[':geburt'] = $_POST['gbdat'];
  }

  if (!empty($_POST['fromdat']) && !empty($_POST['todat'])) {
      $whereConditions[] = "ter_beginn >= :fromdat AND ter_ende <= :todat";
      $arrayValues[':fromdat'] = $_POST['fromdat'];
      $arrayValues[':todat'] = $_POST['todat'];
  }

  if (!empty($whereConditions)) {
      $query .= " WHERE " . implode(" AND ", $whereConditions);
  }

  echo('
  <div class="centered2">
      <div class="card">
          <div class="card-header">
              <h2>Diagnose</h2>
              <h3>Suchkriterien:</h3>
              <h5>SVNR: ' . $_POST['svnr'] . '</h5>
              <h5>Geburtsdatum: ' . $_POST['gbdat'] . '</h5>
              <h5>Behandlungsbeginn: ' . ($_POST['fromdat'] ? $_POST['fromdat'] : 'Kein Datum zur Suche eingegeben') . '</h5>
              <h5>Behandlungsende: ' . ($_POST['todat'] ? $_POST['todat'] : 'Kein Datum zur Suche eingegeben') . '</h5>
          </div>
          <div class="card-body">
  ');

  makeTable($query, $arrayValues);

  echo('
          </div>
          <div class="card-footer">
          </div>
      </div>
  </div>');
}

?>
