<header>
  <nav class="navbar navbar-expand-lg navbar-light navbar-style">
      <a class="navbar-brand" href="#"><img src="img/bt.png" width="40"> BackTogether</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <?php if (isset($_SESSION['username'])) { ?>
                  <a class="nav-link" href="/login.php#logout">Log Out</a>
                  <?php } else { ?>
                  <a class="nav-link" href="/login.php">Log In</a>
                  <?php } ?>
              </li>
          </ul>
          <form action="results.php#search" method="post" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
          </form>
          <?php
          if (isset($_SESSION['username'])) {
              echo "<a class=\"my-2 my-lg-0\">Logged in as" . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "</a>";
          } ?>
      </div>
  </nav>
</header>
