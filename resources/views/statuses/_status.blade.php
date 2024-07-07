<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>单条微博的局部视图</title>
</head>
<body>
<li class="d-flex mt-4 mb-4">
    <a class="flex-shrink-0" href="{{ route('users.show', $user->id) }}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="me-1 gravatar" />
    </a>
    <div class="flex-grow-1 ms-3">
        <h5 class="mt-0 mb-1">{{ $user->name }} <small> / {{ $status->created_at->diffForHumans() }}</small></h5>
        {{ $status->content }}
    </div>

    @can('destroy', $status)
        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('您确定要删除本条微博吗？');">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
        </form>
    @endcan

</li>
</body>
</html>
