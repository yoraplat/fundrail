<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to FundRail</title>
</head>
<style>

    * {
        font-family: sans-serif;
    }
    img {
       max-width: 70%; 
    }
</style>
<body>
    <h1>Welcome to FundRail!</h1>
    <h2>Get your funds on the rail</h2>
    <ul>
        <li><p>Git repo: <a href="https://github.com/yoraplat/fundrail" target="_blank">Fundrail</a></p></li>
        <li>
            <p>Database diagram</p>
            
            <img src="{{ $message->embed('img/database.png') }}" alt="">
            
        </li>
    </ul>
</body>
</html>