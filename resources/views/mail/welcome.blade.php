<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Welcome user</title>
</head>
<body>
	<h1>Welcome {{ $user_firstname }} {{ $user_lastname }}</h1>
	<p>
		Here is your password : <blockquote>{{ $user_password }}</blockquote>
	</p>
	<p>
		Have a nice day, <br>
		Best wishes,<br>
		Siteadministrator
	</p>
</body>
</html>
