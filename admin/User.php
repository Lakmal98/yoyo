<?php ?>

<html>
	<head>
		<link type="text/css" rel="Stylesheet" href="admin.css">
		<title> User Page </title>
	</head>
	<body>
	<div class="Outline">
		<div class="header">
			<img src="logo.png" class="logo">
			<h3 style="left:70px;display:inline;color:white;">YOYO</h3>
			<h2 class="Name">Dashboard</h2>
		</div>

	<ul>
		<li>
			<a href="#Profile">Profile</a>
        </li>
        <li>
			<a href="#Cart">Cart</a>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Order History</a>
			<div class="dropdown-content">
				<a href="#">Recent</a>
				<a href="#">Last Month</a>
			</div>
		</li>
    </ul>

    <div class="row">
  <div class="left" style="background-color:#bbb;">
    <h2>Menu</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
    <ul id="myMenu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">PHP</a></li>
      <li><a href="#">Python</a></li>
      <li><a href="#">jQuery</a></li>
      <li><a href="#">SQL</a></li>
      <li><a href="#">Bootstrap</a></li>
      <li><a href="#">Node.js</a></li>
    </ul>
  </div>
  
  <div class="right" style="background-color:#ddd;">
    <h2>Page Content</h2>
    <p>Start to type for a specific category inside the search bar to "filter" the search options.</p>
    <p>Some text..Some text..Some text..Some text..Some text..Some text..Some text..Some text..</p>
    <p>Some other text..Some text..Some text..Some text..Some text..Some text..Some text..Some text..</p>
    <p>Some text..</p>
  </div>
</div>


<p><strong>Note:</strong> Should add items</p>
</div>
</body>
</html>
