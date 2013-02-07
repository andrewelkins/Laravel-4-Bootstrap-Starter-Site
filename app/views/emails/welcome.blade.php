<html>
	<head>
		<title></title>
	</head>
	<body>
		<p>Dear {{ $user->first_name }},</p>

		<p>Welcome to SiteNameHere! Please click on the following link to confirm your SiteNameHere account:</p>

		<p><a href="{{ URL::to('account/activate/' . $user->id . '/' . $user->getActivationCode()) }}">{{ URL::to('account/activate/' . $user->id . '/' . $user->getActivationCode()) }}</a></p>

		<p>Best regards,</p>

		<p>The SiteNameHere Team</p>
	</body>
</html>
