<?php
require_once 'mod/core/req_auth.php';

$db = pdoConnect();

if ($_SESSION['group_id'] >= 1) {
  $s = "AND title NOT LIKE '%admin%'";
}

$get_officers = "SELECT user_id, first_name, last_name, bio, title, major, user_name, email, image FROM ondzeuta_bea.user WHERE deleted IS NULL $s;";
$get_events = "SELECT event_id, name, date, time, location, type, description, created_by, image FROM ondzeuta_bea.event WHERE deleted IS NULL;";
//var_dump($_SESSION);
//$animate_css = 1;

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Jefferson Ondze Mangha">
	<title>Admin</title>
	<?php require_once 'css/css.php'; ?>
</head>
<body>
  <div class="container-fluid p-0">
    <div class="modal fade" id="officersModal" tabindex="-1" role="dialog" aria-labelledby="officersModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="officersModalLabel">Add Officer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="officers-form" enctype="multipart/form-data" action="mod/member/new.php" method="POST">
            <div class="modal-body">

              <div class="form-group">
                <label for="first-name">First Name</label>
                <input class="form-control" name="first_name" type="text" id="first-name" placeholder="John" required>
              </div>

             
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input class="form-control" name="last_name" type="text" id="last-name" placeholder="Doe" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" type="email" id="email" placeholder="john.doe@mavs.uta.edu" required>
              </div>


              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" name="title" type="text" id="title" placeholder="President" required>
              </div>


              <div class="form-group">
                <label for="bio">Biography</label>
                <textarea class="form-control" name="bio" id="bio" placeholder="John loves puppies and spending time at the rodeo on Fridays."></textarea>
              </div>


              <div class="form-group">
                <label for="major">Major</label>
                <input class="form-control" name="major" type="text" id="major" placeholder="Journalism" required>
              </div>



              <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" name="user_name" type="text" id="username" placeholder="john_doe" required>
              </div>


              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" name="password" type="password" id="password" placeholder="1234567" required>
              </div>

              <div class="form-group">
                <label>Profile Photo</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                          <input type="file" name="image" id="image" accept="image/*">
                        </span>
                    </span>
                </div>
                <img id='img-upload'/>
              </div>

            </div>
            <div class="modal-footer">
              <a href=""><button type="button" class="btn btn-danger">Close</button></a>
              <input type="submit" name="add" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eventModalLabel">Add Event or Meeting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="events-form" enctype="multipart/form-data" action="mod/event/new.php" method="POST">
            <div class="modal-body">

              <div class="form-group">
                <label for="event-title">Event Title</label>
                <input class="form-control" type="text" name="name" id="event-title" placeholder="Former Vice President of the United Sates Joe Biden, speaks Broadcasting at UTA" required>
              </div>

              <div class="form-group">
                <label for="event-date">Date</label>
                  <input class="form-control" type="date" name="date" id="event-date" placeholder="MM/DD/YYY" required>
              </div>


              <div class="form-group">
                <label for="start-time">Time</label>
                <input class="form-control" type="text" name="time" id="start-time" placeholder="1:45-4:00 PM" required>
              </div>

              <div class="form-group">
                <label for="event-location">Event Location</label>
                <input class="form-control" type="text" name="location" id="event-location" placeholder="Blue Bonnet Theatre" required>
              </div>

              <div class="form-group">
                <label for="event-type">Type</label>
                <select class="form-control" id="event-type" name="type">
                  <option value="meeting">Meeting</option>
                  <option value="event">Event</option>
                </select>
              </div>


              <div class="form-group">
                <label for="event-description">Event Description</label>
                <textarea class="form-control" name="description" id="event-description" placeholder="Former VPOTUS knows a thing or two about broadcasting that many have no idea about. He comes to our beautiful campus for a tips and tricks presentation on best practices." required></textarea>
              </div>

              <div class="form-group">
                <label>Event Banner</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                          <input type="file" name="banner" id="banner">
                        </span>
                    </span>
                </div>
                <img id='img-upload'/>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <input type="submit" name="add" class="btn btn-success" />
            </div>
                
          </form>

        </div>
      </div>
    </div>

  </div>
<!-- OFFICERS -->
	<div class="container-fluid p-0">
		<?php require_once 'mod/template/admin-nav.php'; ?>
		<div class="row p-2">
			<div class="col-12">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white justfy-content-center"><h3 class="d-inline">Officers</h3>
            <?php if ($_SESSION['group_id'] <= 1) { ?>
  					<button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#officersModal"> Add <i class="fa fas fa-plus"></i></button>
            <?php } ?>
          </div>

				  <div class="card-body max-height">
				  	<div class="row">
              <?php foreach ($db->query($get_officers) as $row) { ?>
				  		<div class="col-xs-12 col-sm-4 col-md-3 mb-3">
                <div class="card">
                  <?php if (!empty($row['image'])){ ?>
                  <img class="card-img-top" src="./img/user/<?php echo $row['image']; ?>" width="420" alt="<?php echo $row['first_name'], ' ', $row['last_name']; ?> Image" />
                  <?php } else { ?>
                  <img class="card-img-top" width="420" src="./img/user/user.jpg" alt="Card image cap" />
                  <?php } ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['first_name'],' ',$row['last_name'] ?></h5>
                    <?php if (!empty($row['bio'])) { ?>
                    <p class="card-text"><?php echo $row['bio']; ?></p>
                    <?php } ?>
                    <?php if ($_SESSION['group_id'] <= 1 || $_SESSION['user_id'] == $row['user_id']) { ?>
                    <a href="#" class="btn btn-warning edit-officer" data-officer='<?php echo json_encode($row); ?>'>Edit</a>
                    <?php if ($_SESSION['group_id'] <= 1){ ?>
                    <a href="mod/member/delete.php?id=<?php echo $row['user_id']; ?>" class="btn btn-danger delete-officer">Delete</a>
                    <?php }
                        } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
				  	</div>
				  </div>

				</div>
			</div>

<!------------------------------------------>
<!-------------- EVENTS --------------->

			<div class="col-12">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white justfy-content-center"><h3 class="d-inline">Events & Meetings</h3>
					<button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#eventModal"> Add <i class="fa fas fa-plus"></i></button></div>
				  <div class="card-body max-height">
            <div class="row">
              <?php foreach ($db->query($get_events) as $row) { ?>
              <div class="col-xs-12 col-sm-4 col-md-3 mb-3">
                <div class="card">
                  <?php if (!empty($row['image'])){ ?>
                  <img class="card-img-top" src="./img/events/<?php echo $row['image']; ?>" alt="Card image cap" />
                  <?php } else { ?>
                  <img class="card-img-top" src="./img/events/header.jpg" alt="Card image cap" />
                  <?php } ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <?php if (!empty($row['description'])) { ?>
                    <p class="card-text"><?php echo $row['description'] ?></p>
                    <?php } ?>
                    <p class="card-text"><?php echo Date('m/d/Y', strtotime($row['date'])); ?> <small><?php echo $row['time']; ?></small></p>
                    <?php if ($_SESSION['group_id'] <= 1 || $_SESSION['user_id'] == $row['created_by']) { ?>
                    <a href="#" class="btn btn-warning edit-event" data-event='<?php echo json_encode($row); ?>'>Edit</a>
                    <a href="mod/event/delete.php?id=<?php echo $row['event_id']; ?>" class="btn btn-danger delete-event">Delete</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
				</div>
			</div>
		</div>

		<?php require_once 'php-include/footer.php'; ?>
	</div>



	
<?php require_once 'js/js.php'; ?>
<script>
//https://stackoverflow.com/questions/35682138/html5-date-picker-doesnt-show-on-safari
var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
}        
if (datefield.type != "date"){ //if browser doesn't support input type="date", initialize date picker widget:
    $(document).ready(function() {
        $('#your-date').datepicker();
    }); 
}  
</script>

</body>
</html>
