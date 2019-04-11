<?php

?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-toggleable-lg fixed-top mb-3">
	<img src="./img/bea/logo.png">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon text-light"></span>
	</button>
	<div class="nav nav-masthead justify-content-end collapse navbar-collapse" id="navigation">
		 <ul class="navbar-nav">
		    <li class="nav-item">
		        <a class="nav-link <?php echo ($page == 'index')? 'active':''; ?>" href="#">Home</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link <?php echo ($page == 'page1')? 'active':''; ?>" href="#">page1</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link <?php echo ($page == 'page2')? 'active':''; ?>" href="#">page2</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link <?php echo ($page == 'page3')? 'active':''; ?>" href="#">page3</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link <?php echo ($page == 'page4')? 'active':''; ?>" href="#">page4</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link <?php echo ($page == 'page5')? 'active':''; ?>" href="#">page4</a5
		    </li>
		 </ul>
	</div>
</nav>