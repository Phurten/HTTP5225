<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tennis Courts in Toronto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>
  <?php include('reusable/nav.php'); ?>


  <section class="hero-banner">
    <div class="hero-content">
      <h1>Wanna play Tennis in Toronto?</h1>
      <p>Discover amazing tennis courts across Toronto parks</p>

      <div class="hero-search mt-4">
        <div class="search-container">
          <div class="input-group">
            <span class="input-group-text search-icon">
              <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control search-input" id="courtSearch" placeholder="Search by park name or location...">
            <button class="btn btn-search" type="button" id="searchBtn">
              <i class="bi bi-search me-1"></i>Find Courts
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="courts" class="courts-section">
    <div class="container">
      <h2 class="section-title">Find Your Perfect Tennis Court</h2>
      <div class="row">
        
  <?php 
      require('reusable/connect.php');
      //joining three tables to get complete tennis court info
      $query = 'SELECT c.`COL 4` AS park_name, 
                       l.`COL 2` AS location_address,
                       l.`COL 3` AS geometry,
                       c.`COL 5` AS court_type,
                       c.`COL 6` AS num_courts,
                       f.`COL 2` AS has_lights,
                       f.`COL 3` AS winter_play
                FROM courts AS c
                JOIN locations AS l ON c.`COL 3` = l.`COL 1`
                JOIN facilities AS f ON c.`COL 2` = f.`COL 1`
                WHERE c.`COL 4` != "Name"
                ORDER BY c.`COL 4`';
      $result = mysqli_query($connect, $query);
      $parks = mysqli_fetch_all($result, MYSQLI_ASSOC);

      foreach ($parks as $park){
        //extracting GPS coordinates from geometry data for Google Maps
        $geometry = json_decode($park['geometry'], true);
        $coordinates = '';
        if ($geometry && isset($geometry['coordinates'][0])) {
          $lat = $geometry['coordinates'][0][1];
          $lng = $geometry['coordinates'][0][0];
          $coordinates = $lat . ',' . $lng;
        }
        
        echo "<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>";
        echo "<div class='card h-100 tennis-court-card' data-coordinates='" . htmlspecialchars($coordinates) . "' data-park-name='" . htmlspecialchars($park['park_name']) . "' style='cursor: pointer;'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($park['park_name']) . "</h5>";
        echo "<div class='card-text'>";
        echo "<p class='location-text mb-2'>";
        echo "<i class='bi bi-geo-alt-fill text-primary facility-icon'></i>" . htmlspecialchars($park['location_address']);
        echo "</p>";
        echo "<p class='mb-2'>";
        echo "<i class='bi bi-trophy text-success facility-icon'></i>" . htmlspecialchars($park['court_type']) . " courts (" . htmlspecialchars($park['num_courts']) . " courts)";
        echo "</p>";
        
        echo "<div class='facility-text'>";
        //checking if lights are available and displaying appropriate icon
        if($park['has_lights'] == 'Yes') {
            echo "<i class='bi bi-lightbulb-fill text-warning facility-icon'></i><span class='text-success'>Lights available</span>";
        } else {
            echo "<i class='bi bi-lightbulb text-muted facility-icon'></i><span class='text-muted'>No lights</span>";
        }
        
        echo "<br>";
        //checking winter play availability
        if($park['winter_play'] == 'Yes') {
            echo "<i class='bi bi-snow text-info facility-icon'></i><span class='text-info'>Winter play available</span>";
        } else {
            echo "<i class='bi bi-snow text-muted facility-icon'></i><span class='text-muted'>No winter play</span>";
        }
        echo "</div>";

        echo "<div class='mt-auto pt-3'>";
        echo "<small class='text-muted'><i class='bi bi-geo-alt me-1'></i>Click to view on Google Maps</small>";
        echo "</div>";
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
  ?>

      </div>
    </div>
  </section>

  <div id="page-bottom"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  
  <script>
    //setting up search functionality
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('courtSearch');
      const searchBtn = document.getElementById('searchBtn');
      const cards = document.querySelectorAll('.col-lg-4');
      
      function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;
        
        //filtering cards based on search term matching park name or location
        cards.forEach(card => {
          const parkName = card.querySelector('.card-title').textContent.toLowerCase();
          const location = card.querySelector('.location-text').textContent.toLowerCase();
          
          if (searchTerm === '' || parkName.includes(searchTerm) || location.includes(searchTerm)) {
            card.style.display = 'block';
            card.style.animation = 'fadeIn 0.3s ease-in';
            visibleCount++;
          } else {
            card.style.display = 'none';
          }
        });

        let noResultsMsg = document.getElementById('noResultsMessage');
        if (visibleCount === 0 && searchTerm !== '') {
          if (!noResultsMsg) {
            noResultsMsg = document.createElement('div');
            noResultsMsg.id = 'noResultsMessage';
            noResultsMsg.className = 'col-12 text-center py-5';
            noResultsMsg.innerHTML = `
              <div class="alert alert-info">
                <i class="bi bi-search me-2"></i>
                No tennis courts found matching "<strong>${searchTerm}</strong>". Try searching with different keywords.
              </div>
            `;
            document.querySelector('.courts-section .row').appendChild(noResultsMsg);
          }
        } else if (noResultsMsg) {
          noResultsMsg.remove();
        }
      }

      searchBtn.addEventListener('click', performSearch);

      searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          performSearch();
        }
      });

      let searchTimeout;
      searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 300);
      });
    });

    //adding click to open Google Maps
    document.addEventListener('DOMContentLoaded', function() {
      const courtCards = document.querySelectorAll('.tennis-court-card');
      
      courtCards.forEach(card => {
        card.addEventListener('click', function() {
          const coordinates = this.getAttribute('data-coordinates');
          const parkName = this.getAttribute('data-park-name');
          
          //opening Google Maps with exact coordinates or searching by name
          if (coordinates && coordinates !== '') {
            const googleMapsUrl = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(parkName + ' Tennis Court')}&query_place_id=${coordinates}`;
            const directUrl = `https://www.google.com/maps?q=${coordinates}&t=m&z=16`;
            window.open(directUrl, '_blank');
          } else {
            const searchUrl = `https://www.google.com/maps/search/${encodeURIComponent(parkName + ' Tennis Court, Toronto')}`;
            window.open(searchUrl, '_blank');
          }
        });

        card.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(-5px)';
        });
      });
    });

    const style = document.createElement('style');
    style.textContent = `
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>