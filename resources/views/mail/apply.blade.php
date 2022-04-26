<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body>
Name:{{$data['name']}}<br>
Email:{{$data['email']}}<br>
Phone Number:{{$data['phone_number']}}<br>
Message:{{$data['message']}}<br>
</body>
</html>
