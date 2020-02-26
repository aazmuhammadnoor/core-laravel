<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="width:100%;text-align: center !important">
		<h4>Register Application</h4>
		<h5>Hi, {{ $member->first_name }} Thanks for register. Please click link below for activation account</h5>
		<a href="{{ url('activation/'.$member->activation_code) }}" style="padding: 15px;border-radius: 5px;background-color: #4179D6;color : #FFF">Activate</a>
	</div>
</body>
</html>