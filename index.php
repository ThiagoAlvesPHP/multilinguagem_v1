<?php
session_start();
/*https://github.com/statickidz/php-google-translate-free*/
require_once __DIR__ . '/vendor/autoload.php';
use \Statickidz\GoogleTranslate;

if (isset($_SESSION['lg'])) {
	if ($_SESSION['lg'] == 'pt') {
		require 'pt.php';
	} else {
		require 'en.php';
	}
} else {
	require 'pt.php';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multilinguagem</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
  	
	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <div class="collapse navbar-collapse" id="navbar">
	      <ul class="nav navbar-nav">
	          <li class="dropdown">
	            <a href="./" class="dropdown-toggle">
	            	<b id="home"><?=$lg['home']; ?></b>
	            </a>
	          </li>
	          <li class="dropdown">
	            <a href="./" class="dropdown-toggle">
	            	<b id="service"><?=$lg['service']; ?></b>
	            </a>
	          </li>
	          <li class="dropdown">
	            <a href="./" class="dropdown-toggle">
	            	<b id="contact"><?=$lg['contact']; ?></b>
	            </a>
	          </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li>
	          <button style="color: #fff;" value="pt" class="btn btn-success value" title="Português">Pt</button>
	        </li>
	        <li>
	          <button style="color: #fff;" value="en" class="btn btn-danger value" title="Inglês">En</button>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="alert alert-info">
			<?php 
			if (isset($_SESSION['lg'])) {
				if ($_SESSION['lg'] == 'pt') {
					echo 'Português';
				} else {
					echo 'Inglês';
				}
			} else {
				echo 'Português';
			}
			?>
		</div>
		<hr>
		<?php
		if (!empty($_POST['idioma']) && !empty($_POST['texto'])):

			if ($_POST['idioma'] == 'pt') {
				$source = 'en';
				$target = 'pt';
			} else {
				$source = 'pt';
				$target = 'en';
			}
			
			$text = $_POST['texto'];

			$trans = new GoogleTranslate();
			$result = $trans->translate($source, $target, $text);
			?>
			<div class="row">
				<div class="col-sm-6">
					<h3>Original</h3>
					<p>
						<?=htmlspecialchars($_POST['texto']); ?>
					</p>
				</div>
				<div class="col-sm-6">
					<h3>Traduzido</h3>
					<p>
						<?=htmlspecialchars($result); ?>
					</p>
				</div>
			</div>
			<hr>
			<?php
		endif;
		?>
		<form method="POST">
			<label>Traduzir para</label>
			<select class="form-control" required="" name="idioma">
				<option value="en">Inglês</option>
				<option value="pt">Português</option>
			</select>
			<label>Texto</label>
			<textarea class="form-control" name="texto" required=""></textarea>
			<br>
			<button class="btn btn-default">Traduzir</button>
		</form>
	</div>
  	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>



