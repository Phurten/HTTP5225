<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - Tennis Courts in Toronto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>
  <?php include('reusable/nav.php'); ?>

  <!-- Credits Section -->
  <section class="credits-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="credits-card">
            <h2 class="section-title">Data Credits & Acknowledgments</h2>
            <div class="credits-content">
              <div class="credit-item">
                <div class="credit-logo">
                  <i class="bi bi-database-fill"></i>
                </div>
                <div class="credit-text">
                  <h4>Open Toronto</h4>
                  <p class="mb-3">
                    This project is made possible thanks to the <strong>Open Toronto</strong> initiative, which provides free access to the city's public datasets. The tennis court information displayed on this platform comes directly from Toronto's open data portal.
                  </p>
                  <div class="dataset-link">
                    <a href="https://open.toronto.ca/dataset/tennis-courts-facilities/" target="_blank" class="btn btn-primary">
                      <i class="bi bi-box-arrow-up-right me-2"></i>
                      View Original Dataset
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Story Section -->
  <section class="story-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="story-card">
            <h2 class="section-title">Why I Built Tennis Finder</h2>
            <div class="story-content">
              <p class="mb-4">
                <i class="bi bi-tennis story-icon"></i>
                Tennis has been a huge part of my life, and when I moved to Toronto, one of my first priorities was finding the perfect courts to continue my passion for the game. The excitement of exploring a new city combined with my love for tennis created the perfect motivation for this project.
              </p>
              
              <p class="mb-4">
                <i class="bi bi-geo-alt-fill story-icon"></i>
                My home base is near <strong>High Park</strong> - it's my go-to spot for tennis and has become my favorite place to play. The courts there are fantastic, and the park's natural beauty makes every game feel special. But Toronto is such a vast and diverse city, and as I explore different neighborhoods, I want to discover amazing tennis courts everywhere I go.
              </p>
              
              <p class="mb-4">
                <i class="bi bi-people-fill story-icon"></i>
                This platform isn't just about finding courts; it's about building a community of tennis lovers who can discover, share, and enjoy the amazing tennis facilities that Toronto has to offer. From public courts for casual games to club facilities for more serious play, there's something for everyone.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="page-bottom"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
