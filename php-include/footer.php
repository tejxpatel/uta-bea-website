<footer class="container-fluid py-3">
  <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-xs-12 col-sm-3 col-md-3 py-1">
          <img src="img/bea/BEA-Logo-white.png" width="100" height="100" viewBox="0 0 100 100">
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 quick-links">
          <h5>Quick Links</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-white" href="index.php">Home</a></li>
            <li><a class="text-white" href="officers.php">Officers</a></li>
            <li><a class="text-white" href="events.php">Events</a></li>
            <li><a class="text-white" href="meetings.php">Meetings</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 follow-us">
          <h5>Follow Us</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-white" href="https://www.facebook.com/mavsbea/" target="_blank">Facebook</a></li>
            <li><a class="text-white" href="https://twitter.com/MavsSbea" target="_blank">Twitter</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 admin-footer">
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
      </div>
    </footer>

