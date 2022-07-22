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
            justify-content: center;
            flex-direction: column;
            background-color: #1f2937;
        }
    </style>
</head>

<body>
    <button type="submit"
        class="mb-16 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        <a href="/">Voltar ao Menu</a>
    </button>
    <h1 class="pb-8 text-center text-white font-mono text-2xl">Detalhes de {{ $user->name }}</h1>
    <div class="w-2/6">
        <div class="font-mono bg-white text-black shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id">
                    ID do usuário
                </label>
                <input readonly id="id" name="id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="{{ $user->id }}">
            </div>
            <div class="mb-4">
                <label class="block text-black text-sm font-bold mb-2" for="name">
                    Nome Completo
                </label>
                <input disabled name="name" id="name" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="{{ $user->name }}">
            </div>
            <div class="mb-4">
                <label class="block text-black text-sm font-bold mb-2" for="username">
                    Nome de Usuário
                </label>
                <input readonly name="username" id="username" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="{{ $user->username }}">
            </div>
            <div class="mb-4">
                <label class="block text-black text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input readonly name="email" id="email" type="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="{{ $user->email }}">
            </div>
        </div>
    </div>
</body>

</html>
