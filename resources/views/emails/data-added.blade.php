<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message pour un développeur</title>
</head>
<body>
    <h1>New  Message pour le développeur 
        <span>{{ $data['dev_name'] }} {{ $data['dev_firstname'] }}</span> </h1>
    <p><strong>Id développeur:</strong> {{$data['dev_id'] }}</p>
    <p><strong>Name Entreprise:</strong> {{ $data['name'] }}</p>
    <p><strong>Email Entreprise:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone Entreprise:</strong> {{ $data['phone'] }}</p>
    <p><strong>leur Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
