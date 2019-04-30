<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
</head>
<body>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Intro</th>
            <th>Content</th>
        </tr>

        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->intro }}</td>
            <td>{{ $project->content }}</td>
        </tr>
    </table>
</body>
</html>