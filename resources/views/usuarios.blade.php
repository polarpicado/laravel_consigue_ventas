<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>

<body>
    <!-- Hacer tabla de Usuarios Laravel-->
    <h1>Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">Ver</a>
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                        <a href="{{ route('users.destroy', $user->id) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
</body>

</html>
