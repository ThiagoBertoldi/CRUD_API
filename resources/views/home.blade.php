<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            background-color: #1f2937;
        }
    </style>
</head>

<body>
    <button class="mt-12 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="/new-user">Novo
            Usuário</a></button>

    <h1 class="users mt-8 mb-4 text-center font-mono text-white text-2xl">
        Usuários
    </h1>
    @if (session('success'))
        <div class="mt-8 mb-8 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('fail'))
        <div class="mt-8 mb-8 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p>{{ session('fail') }}</p>
        </div>
    @endif
    <div class="w-3/5 bg-white rounded-lg flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    ID
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Username
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Email
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Detalhes
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Editar
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Excluir
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b w-full">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $user->id }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $user->username }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <form action="/show-user" method="GET">
                                            @csrf
                                            <button type="submit" name="id_user" value="{{ $user->id }}"
                                                class="w-28 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Detalhes</button>
                                        </form>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <form action="/edit-user" method="GET">
                                            @csrf
                                            <button type="submit" name="id_user" value="{{ $user->id }}"
                                                class="w-28 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                                        </form>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <form action="/delete-user" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" name="id_user" value="{{ $user->id }}"
                                                class="w-28 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
