<!DOCTYPE html>
<style>
	div.stars {
		width: 270px;
		display: inline-block;
	}
	input.star { display: none; }
	label.star {
		float: right;
		padding: 10px;
		font-size: 36px;
		color: #444;
		transition: all .2s;
	}
	input.star:checked ~ label.star:before {
		content: '\f005';
		color: #FD4;
		transition: all .25s;
	}
	input.star-5:checked ~ label.star:before {
		color: #FE7;
		text-shadow: 0 0 20px #952;
	}
	input.star-1:checked ~ label.star:before { color: #ff0008; }
	input.star-2:checked ~ label.star:before { color: #ff5200; }
	input.star-3:checked ~ label.star:before { color: #ff9007; }
	input.star-4:checked ~ label.star:before { color: #ffc533; }
	label.star:hover { transform: rotate(-72deg) scale(1.2); }
	label.star:before {
		content: '\f006';
		font-family: FontAwesome;
	}
	</style>
<?php
	require("../header.php");
	require("../navbar.php");
?>
	
<div class="container">
	<div class="row">

<h1>Hinda Bemme</h1>


<div class="container">
	
		<div class="row">
		
			<div class="col-sm-4 col-md-3">
<html>
<body>

<h2>BMW1</h2>
<img src="<?php echo $path . $img ?>" alt="" style="width:350px;height:228px;" />
<img src="bmw1.jpg" alt="BMW" style="width:350px;height:228px;">
<div class="stars">
     <input class="star star-5" id="grade-5" type="radio" value="5" name="grade">
     <label class="star star-5" for="grade-5"></label>
     <input class="star star-4" id="grade-4" type="radio" value="4" name="grade">
     <label class="star star-4" for="grade-4"></label>
     <input class="star star-3" id="grade-3" type="radio" value="3" name="grade">
     <label class="star star-3" for="grade-3"></label>
     <input class="star star-2" id="grade-2" type="radio" value="2" name="grade">
     <label class="star star-2" for="grade-2"></label>
     <input class="star star-1" id="grade-1" type="radio" value="1" name="grade">
     <label class="star star-1" for="grade-1"></label>
   </div><br>
</body>
</html>
<html>
<body>

</html>






<!DOCTYPE html>

<style>
div.stars {
		width: 270px;
		display: inline-block;
	}
	input.star { display: none; }
	label.star {
		float: right;
		padding: 10px;
		font-size: 36px;
		color: #444;
		transition: all .2s;
	}
	input.star:checked ~ label.star:before {
		content: '\f005';
		color: #FD4;
		transition: all .25s;
	}
	input.star-5:checked ~ label.star:before {
		color: #FE7;
		text-shadow: 0 0 20px #952;
	}
	input.star-1:checked ~ label.star:before { color: #ff0008; }
	input.star-2:checked ~ label.star:before { color: #ff5200; }
	input.star-3:checked ~ label.star:before { color: #ff9007; }
	input.star-4:checked ~ label.star:before { color: #ffc533; }
	label.star:hover { transform: rotate(-72deg) scale(1.2); }
	label.star:before {
		content: '\f006';
		font-family: FontAwesome;
	}
</style>
</head> 

</body>
</html>          
<?php require("../footer.php"); ?>                      		