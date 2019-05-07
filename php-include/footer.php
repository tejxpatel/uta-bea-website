<footer class="container-fluid py-5">
      <div class="row">
        <div class="col-12 col-md-3">
          <img src="img/bea/BEA-Logo-white.png" width="100" height="100" viewBox="0 0 100 100" class="ml-5">
          <!-- <small class="ml-5 mb-3">&copy; 2019</small> -->
        </div>
        <div class="col-12 col-md-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-white" href="index.php">Home</a></li>
            <li><a class="text-white" href="officers.php">Officers</a></li>
            <li><a class="text-white" href="events.php">Events</a></li>
            <li><a class="text-white" href="meetings.php">Meetings</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h5>Follow Us</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-white" href="https://www.facebook.com/mavsbea/" target="_blank">Facebook</a></li>
            <li><a class="text-white" href="https://twitter.com/MavsSbea" target="_blank">Twitter</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h5>Admin</h5>
          <ul class="list-unstyled text-small">
            <?php if ($_SESSION['auth']) { ?>
              <li><a class="text-white" href="admin.php?logout=1">Logout</a></li>
            <?php } else { ?>
              <li><a class="text-white" href="login.php">Login</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </footer>

