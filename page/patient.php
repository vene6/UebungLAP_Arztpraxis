<style>
  .form-label{
    width: 300px;
  }
  .card{
    width: 600px;
  }
  .centered{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
  }
</style>

<form class="centered">
  <div class="card">
    <div class="card-header">
      <h2>Patienteninfo</h2>
    </div>
    <div class="card-body">
        <div class="mb-3">
          <label for="svnr" class="form-label">Sozialversicherungs-NR<input type="svnr" class="form-control" id="svnr" aria-describedby="svnr" placeholder="4-stellige Zahl eingeben z.B.: 1234"></label>
        </div>
        <div class="mb-3">
          <label for="gbdat" class="form-label">Geburtsdatum<input type="gbdat" class="form-control" id="gbdat" aria-describedby="gbdat" placeholder="YYYY-MM-DD"></label>
        </div>
      <h3>Behandlungszeitraum</h3>
        <div class="mb-3">
          <label for="fromdat" class="form-label">Zeitraum von<input type="date" class="form-control" id="fromdat" aria-describedby="fromdat"></label>
        </div>
        <div class="mb-3">
          <label for="todat" class="form-label">Zeitraum bis<input type="date" class="form-control" id="todat" aria-describedby="todat"></label>
        </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Anzeigen</button>
    </div>
  </div>

  
</form>