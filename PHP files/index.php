<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
	</head>
	<style>
		body{
			background-color:  #e6e6e6;
		}
		h1 {
		text-align: center;
		color: green;
		}
		h2 {
		color: green
		}
		form.m1{
			height: 180px;
			width: 200px;
			border: 10px solid green;
			padding: 20px;
			margin-top: 75px;
			margin-bottom: 200px;
			margin-left: 500px;
			margin-right: 200px;
		}

		select{
			height: 30px;
			width: 200px;
		}
		input{
			height: 30px;
			width: 200px;
		}
		input.m1{
			height: 30px;
			width: 320px;
			margin-top: 30px;
			margin-left: 450px;
		}

		.button{
			height: 35px;
		}

		.button2{
			text-align: center;
			height: 30px;
			width: 200px;
		}

		input.m4{
			height: 30px;
			width: 320px;
			margin-top: 30px;
			margin-left: 450px;
		}

		input.m6{
			height: 30px;
			width: 320px;
			margin-top: 30px;
			margin-left: 450px;
		}


		
	</style>
    <body>
		<h1>IMDB</h1>
		

		<form class="m2" action="person.php" method="POST">
			<input class="m1" type="text" name="Enter" placeholder="Enter Actor, Director or any Artist">
			<button class = "button" type="submit" style="color: green">Search</button>
		</form>

		<form class="m3" action="movie.php" method="POST">
			<input class="m4" type="text" name="Title" placeholder="Enter a Movie name">
			<button class = "button button3" type="submit" style="color: green">Search</button>
		</form>

		<form class="m5" action="tvSeries.php" method="POST">
			<input class="m6" type="text" name="TVseries" placeholder="Enter a TV series name">
			<button class = "button button4" type="submit" style="color: green">Search</button>
		</form>
		
		<form class="m1" action="rating.php" method="POST" id="form1">
            
			Genre:<br>
			<select name="Genre">
				<option selected="None">None</option>
				<option value="Action">Action</option>
				<option value="Crime">Crime</option>
				<option value="Documentary">Documentary</option>
				<option value="Short">Short</option>
				<option value="Animation">Animation</option>
				<option value="Comedy">Comedy</option>
				<option value="Romance">Romance</option>
				<option value="Sport">Sport</option>
				<option value="News">News</option>
				<option value="Drama">Drama</option>
				<option value="Family">Family</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Horror">Horror</option>
				<option value="Biography">Biography</option>
				<option value="Music">Music</option>
				<option value="War">War</option>
				<option value="Western">Western</option>
				<option value="Adventure">Adventure</option>
				<option value="History">History</option>
				<option value="Mystery">Mystery</option>
				<option value="Sci-Fi">Sci-Fi</option>
				<option value="Thriller">Thriller</option>
				<option value="Musical">Musical</option>
				<option value="Film-Noir">Film-Noir</option>
				<option value="Game-Show">Game-Show</option>
				<option value="Talk-Show">Talk-Show</option>
				<option value="Reality-TV">Reality-TV</option>
				<option value="Adult">Adult</option>
			</select>

			Year:<br>
			<input type="number" min="1900" max="2019" name="Year" placeholder="Year">
			
			Rating: <br>
			<select name="ratings">
				<option value="less than 3">less than 3</option>
				<option value="3 - 4">3 - 4</option>
				<option value="5 - 7">5 - 7</option>
				<option value="greater than 7">greater than 7</option>
			</select>
			<button class="button button2" type="submit" form="form1" style="color: green">Submit</button>
		</form>
		
       
    </body>
</html>
