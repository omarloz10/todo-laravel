<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    <title>Todo con Laravel</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="/">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo" />
                </a>
            </div>

            <div class="navbar__nav">
                <ul class="navbar__nav-list">
                    
                    <li class="navbar__nav-link">
                        <a href="">Todo</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="list__todo">
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>
                                Descripción
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($todos->isNotEmpty())
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>
                                        @if ($todo->status == 0)
                                            {{ $todo->name }}
                                        @else
                                            <del>{{ $todo->name }}</del>
                                        @endif
                                    </td>
                                    <td>
                                        <span>
                                            <img src="{{ $todo->status == 0 ? asset('img/incomplete.svg') : asset('img/completed.svg') }}"
                                                alt="">
                                        </span>
                                        {{ $todo->status == 0 ? 'Pendiente' : 'Finalizada' }}
                                    </td>

                                    <td class="actions">
                                        <form action="{{ route('todo.edit', $todo) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="button_complete" {{ $todo->status == 0 ? '' : 'disabled' }}>
                                                <img src="{{ asset('img/check.svg') }}" alt="" width="28px"
                                                    height="28px">
                                            </button>
                                        </form>
                                        <br>
                                        <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button_delete">
                                                <img src="{{ asset('img/trash.svg') }}" alt="" width="28px"
                                                    height="28px">
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td>
                                    No hay Datos
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </section>

        <section class="add__todo-form">
            <div class="container">

                @if (session('success'))
                    <div class="mesagge success" id="mesagge">
                        {{ session('success') }}
                    </div>
                @endif

                @error('title')
                    <div class="mesagge error" id="mesagge">
                        {{ $message }}
                    </div>
                @enderror

                <h2>AGREGAR UNA NUEVA TAREA</h2>
                <form action="{{ route('save') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="¿Que debes hacer?" name="title" id="title">
                    <button type="submit">
                        <b>Agregar Tarea</b>
                    </button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        &copy; Creado por Omar Lozano
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
