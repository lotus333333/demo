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
@if ($feed_items->count() > 0)
    <ul class="list-unstyled">
        @foreach ($feed_items as $status)
            @include('statuses._status',  ['user' => $status->user])
        @endforeach
    </ul>
    <div class="mt-5">
        {!! $feed_items->render() !!}
    </div>
@else
    <p>没有数据！</p>
@endif
</body>
</html>
