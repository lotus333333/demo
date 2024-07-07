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
<a href="{{ route('users.followings', $user->id) }}">
    <strong id="following" class="stat">
        {{ count($user->followings) }}
    </strong>
    关注
</a>
<a href="{{ route('users.followers', $user->id) }}">
    <strong id="followers" class="stat">
        {{ count($user->followers) }}
    </strong>
    粉丝
</a>
<a href="{{ route('users.show', $user->id) }}">
    <strong id="statuses" class="stat">
        {{ $user->statuses()->count() }}
    </strong>
    微博
</a>
</body>
</html>
