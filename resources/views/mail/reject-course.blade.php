<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso rechazado</title>
</head>

<body>
    <h1 class="text-blue-700">Rechazo {{ $course->title }} </h1>
    <p>El curso <strong>{{ $course->title }}</strong> se ha rechazado.</p>
    <h2>Motivo: {!! $course->observation->body !!} </h2>
</body>

</html>
