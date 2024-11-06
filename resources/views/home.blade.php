<!DOCTYPE html>
<html lang="en ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
</head>

<body>
    <h1>To Do list</h1>

    @foreach ($taskListItems as $taskListItem)  
    <p><input type="checkbox" name="is_complete" id="is_complete" {{ $taskListItem->is_complete ? 'checked' : '' }}>{{ $taskListItem->task_name }}</p>
    @endforeach

    <form action="{{route('saveItem')}}" method="POST" accept="utf-8">
        {{csrf_field()}}
        <label for="task">Add Task</label>
        <input type="text" name="task" id="task">
        <button id="add" type="submit">Add</button>
    </form>
</body>

</html>