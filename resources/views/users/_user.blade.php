<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="list-group-item">
    <img class="me-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>
    <a href="{{ route('users.show', $user) }}">
        {{ $user->name }}
    </a>
    @can('destroy', $user)
        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-end">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
        </form>
    @endcan
</div>
</body>
</html>
