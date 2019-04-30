<?php
//require_once 'mod/core/req_auth.php';

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

<!-- OFFICERS -->

	<div class="container-fluid">
		<?php require_once 'mod/template/admin-nav.php'; ?>
		<div class="row p-2">
			<div class="col-12">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white justfy-content-center"><h3 class="d-inline">Officers</h3>
					<button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"> Add <i class="fa fas fa-plus"></i></button></div>
				  <div class="card-body max-height p-0">
				  	<div class="row p-0">
				  		<div class="col-xs-12 col-md-6">
				  			<div class="card-body">
						  	<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="./img/user/user.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Card title</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							    <a href="#" class="btn btn-warning">Edit</a>
							    <a href="#" class="btn btn-danger">Delete</a>
							  </div>
							</div>
						  </div>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>

<!-- ADD OFFICER MODAL -->

			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Officer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
			<form>

  <div class="form-group">
    <label for="firstName">First Name</label>
		<input class="form-control" type="text" id="firstName">
  </div>

 
  <div class="form-group">
    <label for="lastName">Last Name</label>
		<input class="form-control" type="text" id="lastName">
  </div>

	<div class="form-group">
    <label for="major">Email</label>
		<input class="form-control" type="text" id="major">
  </div>


  <div class="form-group">
    <label for="title">Position</label>
		<input class="form-control" type="text" id="title">
  </div>


	<div class="form-group">
    <label for="bio">Biography</label>
		<input class="form-control" type="text" id="bio">
  </div>


	<div class="form-group">
    <label for="major">Major</label>
		<input class="form-control" type="text" id="major">
  </div>



	<div class="form-group">
    <label for="username">Username</label>
		<input class="form-control" type="text" id="username">
  </div>


	<div class="form-group">
  <label for="password">Password</label>
    <input class="form-control" type="password" id="password">
</div>



	<div class="form-group">
        <label>Profile Photo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                  <input type="file" id="imgInp">
                </span>
            </span>
        </div>
        <img id='img-upload'/>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success ">Submit</button>
      </div>
			</form>
    </div>
  </div>
</div>

<!------------------------------------------>
<!-------------- EVENTS --------------->

			<div class="col-12 col-lg-6">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white justfy-content-center"><h3 class="d-inline">Events</h3>
					<button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#eventModal"> Add <i class="fa fas fa-plus"></i></button></div>
				  <div class="card-body max-height p-0">
				  	<div class="row p-0">
				  		<div class="col-xs-12 col-md-6">
				  			<div class="card-body">
						  	<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="./img/user/user.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Card title</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							    <a href="#" class="btn btn-warning">Edit</a>
							    <a href="#" class="btn btn-danger">Delete</a>
							  </div>
							</div>
						  </div>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>





<!-------------- EVENT MODAL --------------->

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form>

<div class="form-group">
    <label for="eventTitle">Event Title</label>
		<input class="form-control" type="text" id="eventTitle">
  </div>

	<div class="form-group">
  <label for="eventDate">Date</label>
    <input class="form-control" type="date" id="eventDate" placeholder="MM/DD/YYY">
</div>


<div class="form-group">
  <label for="startTime">Start Time</label>
    <input class="form-control" type="time" id="startTime" placeholder="1:45 PM">
</div>


<div class="form-group">
  <label for="endTime">End Time</label>
    <input class="form-control" type="time" id="endTime" placeholder="2:45 PM">
</div>

<div class="form-group">
    <label for="eventDescription">Event Location</label>
		<input class="form-control" type="text" id="eventDescription">
  </div>


	<div class="form-group">
    <label for="eventDescription">Event Description</label>
		<input class="form-control" type="text" id="eventDescription">
  </div>

	<div class="form-group">
        <label>Event Banner</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                  <input type="file" id="imgInp">
                </span>
            </span>
        </div>
        <img id='img-upload'/>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success ">Submit</button>
      </div>
			
			</form>

    </div>
  </div>
</div>

<!------------------------------------->
<!-------------- MEETINGS --------------->

			<div class="col-12 col-lg-6">
				<div class="card mb-3">
				  <div class="card-header bg-primary text-white justfy-content-center"><h3 class="d-inline">Meetings</h3>
				  <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#meetingsModal"> Add <i class="fa fas fa-plus"></i></button></div>
					<div class="card-body max-height p-0">
				  	<div class="row p-0">
				  		<div class="col-xs-12 col-md-6">
				  			<div class="card-body">
						  	<div class="card" style="width: 18rem;">
							  <div class="card-body">
							    <h5 class="card-title">Card title</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							    <a href="#" class="btn btn-warning">Edit</a>
							    <a href="#" class="btn btn-danger">Delete</a>
							  </div>
							</div>
						  </div>
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>

<!-------------- Meetings Modal --------------->
		<div class="modal fade" id="meetingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="meetingsModalLabel">Add Meeting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form>

			<div class="form-group">
    <label for="meetingTitle">Meeting Title</label>
		<input class="form-control" type="text" id="meetingTitle">
	
  </div>

	<div class="form-group">
  <label for="meetingDate">Date</label>
    <input class="form-control" type="date" id="meetingDate"  placeholder="MM/DD/YYY">
</div>

<div class="form-group">
  <label for="startTime">Start Time</label>
    <input class="form-control" type="time" id="startTime" placeholder="1:45 PM">
</div>


<div class="form-group">
  <label for="endTime">End Time</label>
    <input class="form-control" type="time" id="endTime" placeholder="2:45 PM">
</div>

<div class="form-group">
    <label for="meetingLocation">Meeting Location</label>
		<input class="form-control" type="text" id="meetingLocation">
  </div>


	<div class="form-group">
    <label for="meetingAgenda">Meeting Agenda</label>
		<textarea class="form-control" rows="5" id="meetingAgenda"></textarea>
  </div>

 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success ">Submit</button>
      </div>
			
			</form>

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
