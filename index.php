<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="icon" type="image/x-icon" href="image/favicon.ico"/>
	<title>Highlight - Make a point!</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">

			<!-- Top Header -->
			<div class="text-center">
				<a href="." id="header">
					<div class="page-header">
						<h1>Highlight</h1>
					</div>
				</a>
				<h3>Make a <span class="red">Point!</span><br><span class="glyphicon glyphicon-pencil"
																	aria-hidden="true"></span></h3>
			</div>

			<?php
			if (!isset($_GET["data"])) { ?>
				<!-- Form -->
				<form id="form">
					<div class="form-group">
						<label for="message">Message:</label>
						<textarea id="message" class="form-control" name="message" rows="5"
								  placeholder="Enter your message"
								  required></textarea>
					</div>

					<div class="form-group">
						<label for="keywords">Keywords:</label>
						<input type="text" id="keywords" class="form-control" placeholder="Enter keywords to highlight">
					</div>

					<input type="submit" class="btn btn-lg btn-default btn-block" value="Create highlighted message">
				</form>
				<?php
			} else {
				$data = explode(";", $_GET["data"]);
				$text = htmlspecialchars(base64_decode($data[0]));
				$keywords = explode(",", base64_decode($data[1]));
				foreach ($keywords as $keyword) {
					$text = str_replace(htmlspecialchars(trim($keyword)),
						"<span class='red'>" . htmlspecialchars(trim($keyword)) . "</span>", $text);
				}
				?>
				<!-- Message -->
				<div class="jumbotron text-center">
					<h3><?= $text ?></span></h3>
				</div>
				<?php
			}
			?>

			<!-- Link to github repo -->
			<a href="https://github.com/cyanoise/Highlight" target="_blank">
				<img id="githubrepo" src="image/GitHub-Mark-64px.png" alt="Github Repository Link"
					 class="img-responsive center-block">
			</a>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>

<!-- Form submit -->
<script type="text/javascript">
	$(document).ready(function () {
		$('#form').submit(function (e) {
			e.preventDefault();
			var message = $('#message').val();
			var keywords = $('#keywords').val();
			var data = btoa(message) + ';' + btoa(keywords);
			$('<form><input type="hidden" name="data" value="' + data + '"></form>').appendTo('body').submit();
		});
	});
</script>
</body>

</html>