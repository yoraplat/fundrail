<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to FundRail</title>
</head>
<style>
</style>
<body>
    <h1>You have a new funder!</h1>
    <h2>{{ $title }}</h2>
    <p>{{ $content }}</p>
    <a href="http://127.0.0.1:8000/project/{{ $projectId }}">Check project fundings</a>
</body>
</html>