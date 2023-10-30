<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arztpraxis</title>
  <link href="dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  include 'functions/conn.php';
  include 'functions/function.php';
  include 'page/navbar.php';
  if(isset($_GET['seite']))
    {
      switch($_GET['seite'])
      {
        case 'patient':
          include 'page/patient.php';
          break;
          case 'class':
            include 'page/class.php';
            break;
          case 'class2':
            include 'page/class2.php';
            break;
          case 'suche':
            include 'page/search.php';
            break;
        default:
          include 'page/home.php';
      }
    } else 
    {
      include "page/home.php";
    }
  ?>
</body>
<main class="d-flex flex-nowrap">

</main>
</html>