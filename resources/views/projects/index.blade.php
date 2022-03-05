<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Projects</h1>

    @forelse ($projects as $project)
    <span>
        <a href="{{$project->path()}}">{{ $project->title }}</a>
        <br>
        {{ $project->description }}
    </span>
    @empty
        <h2>No projects yet</h2>
    @endforelse
</body>
</html>