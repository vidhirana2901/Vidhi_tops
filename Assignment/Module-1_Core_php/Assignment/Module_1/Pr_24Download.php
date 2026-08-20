<html>
<head>
	<title>Demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
	<form>
	<h1 class="text-bg-warning text-center">Download Music</h1>
	<br><br>
	<div class="container-fluid bg-info">
	  <div class="row">
		<div class="col">
			<img src="Dewana.jpg" alt="Dewana Ringtone"></img>
		</div>
		<div class="col">
			<p class="h3">Dewana Dewana Ringtone</p>
		</div>
		<div class="col">
			<button type="submit" class="btn btn-primary" name="Dewana">Download</button>
		</div>
	  </div>
	</div>
	
	<div class="container-fluid bg-info">
	  <div class="row">
		<div class="col">
			<img src="Meri_Duniya.jpg" alt="Meri_Duniya Ringtone"></img>
		</div>
		<div class="col">
			<p class="h3">Meri Duniya Ringtone</p>
		</div>
		<div class="col">
			<button type="submit" class="btn btn-primary" name="Meri_Duniya">Download</button>
		</div>
	  </div>
	</div>
	</form>


<?php
if(isset($_REQUEST['Dewana']))
{
header('Content-type:application/octect-stream'); 
header('Content-Disposition:attachment;filename="Dewana_Dewana_Ringtone.mp3"');
readfile('Dewana_Dewana.mp3'); 
}
if(isset($_REQUEST['Meri_Duniya']))
{
header('Content-type:application/octect-stream'); 
header('Content-Disposition:attachment;filename="Meri_Duniya_Ringtone.mp3"');
readfile('Meri_Duniya.mp3'); 
}
 
?> 
<body>
</html>