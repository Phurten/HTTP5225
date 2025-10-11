<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root { --bs-font-sans-serif: 'Ubuntu', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif; }
    .card { border-radius: .75rem; overflow: hidden; transition: border-color .15s ease; }
    .card:hover { border-color: var(--bs-danger, #dc3545) !important; }
    .card .card-body { display: flex; flex-direction: column; gap: .5rem; }
    html { scroll-behavior: smooth; }
  </style>
</head>
<body>
  <?php include('reusable/nav.php'); ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col d-flex align-items-center justify-content-between">
          <h1 id="page-top" class="display-4 mt-5 mb-5 text-danger">All Schools</h1>
          <a href="#page-bottom" class="btn btn-outline-danger mt-5 mb-5">Go to bottom</a>
        </div>
      </div>
    </div>
  </div>

  <?php 
      require('reusable/connect.php');
      $query = 'SELECT * FROM schools';
      $schools = mysqli_query($connect, $query);
      // echo '<pre>';
      // echo print_r($students);
      // echo '</pre>';
  ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <?php
          foreach($schools as $school){
            echo '<div class="col-md-4 mt-2 mb-2">
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <h5 class="card-title text-danger">' . $school['School Name'] . '</h5>
                        <p class="card-text mb-1"><span class="text-muted">' . $school['School Level'] . '</span></p>
                        <div class="d-flex flex-wrap gap-2 mb-2">
                          <a class="badge bg-light text-secondary border text-decoration-none" href="tel:' . $school['Phone'] . '"><i class="bi bi-telephone me-1"></i>' . $school['Phone'] . '</a>
                          <a class="badge bg-light text-secondary border text-decoration-none" href="mailto:' . $school['Email'] . '"><i class="bi bi-envelope me-1"></i>' . $school['Email'] . '</a>
                        </div>

                        <div class="mb-2 d-flex flex-wrap gap-1">
                          <span class="badge bg-light text-secondary border">' . $school['School Language'] . '</span>
                          <span class="badge bg-light text-secondary border">' . $school['School Type'] . '</span>
                          <span class="badge bg-light text-secondary border">' . $school['Grade Range'] . '</span>
                          <span class="badge bg-light text-secondary border">' . $school['School Special Conditions'] . '</span>
                        </div>

                        <p class="card-text mb-2"><i class="bi bi-geo-alt me-1"></i>' . $school['Street'] . ', ' . $school['City'] . ', ' . $school['Province'] . ' ' . $school['Postal Code'] . '</p>

                        <div class="d-flex gap-2 flex-wrap mb-2">
                          <a href="' . $school['Website'] . '" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary"><i class="bi bi-globe me-1"></i>' . $school['Website'] . '</a>
                          <a href="' . $school['Board Website'] . '" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary"><i class="bi bi-building me-1"></i>' . $school['Board Website'] . '</a>
                        </div>

                        <a class="small text-decoration-none" data-bs-toggle="collapse" href="#details-' . $school['id'] . '" role="button" aria-expanded="false" aria-controls="details-' . $school['id'] . '"><i class="bi bi-chevron-down me-1"></i>More details</a>
                        <div class="collapse mt-2" id="details-' . $school['id'] . '">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Board Name:</strong> ' . $school['Board Name'] . '</li>
                            <li class="list-group-item"><strong>School Number:</strong> ' . $school['School Number'] . '</li>
                            <li class="list-group-item"><strong>Fax:</strong> ' . $school['Fax'] . '</li>
                            <li class="list-group-item"><strong>Date Open:</strong> ' . $school['Date Open'] . '</li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <form action="updateSchool.php">
                              <input type="hidden" name="id" value="' . $school['id'] . '">
                              <button type="submit" name="updateSchool" class="btn btn-sm btn-primary">Update</button>
                            </form>
                          </div>
                          <div class="col text-end">
                            <form action="deleteSchool.php" method="GET">
                                <input type="hidden" name="id" value="' . $school['id'] . '">
                                <button type="submit" name="deleteSchool" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';  
          }
        ?>
      </div>
    </div>
  </div>

  <div class="container py-4">
    <div class="text-center">
      <a href="#page-top" class="btn btn-outline-danger">Go to top</a>
    </div>
  </div>

  <div id="page-bottom"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>