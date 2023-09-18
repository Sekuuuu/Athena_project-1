<!-- resources/views/todos/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
</head>

<body>
    <h1>Todo List</h1>
    <form method="POST" action="/todos">
        @csrf
        <input type="text" name="title" placeholder="Add a new task..." required>
        <button type="submit">Add</button>
    </form>
    <ul>
        @foreach ($todos as $todo)
            <li>
                {{-- <input type="checkbox" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}> --}}
                {{ $todo->title }}
                <form method="POST" action="/todos/{{ $todo->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>
