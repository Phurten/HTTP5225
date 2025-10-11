<?php $current = basename($_SERVER['PHP_SELF']); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ontario Public Schools</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $current === 'index.php' ? 'active bg-white text-danger rounded px-2' : 'text-white'; ?>" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current === 'addSchool.php' ? 'active bg-white text-danger rounded px-2' : 'text-white'; ?>" href="addSchool.php">Add School</a>
        </li>
      </ul>
    </div>
  </div>
</nav>