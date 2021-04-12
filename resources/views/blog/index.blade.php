<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .blog__list {
            display:flex;
            flex-direction: column;
            justify-content: center;
            margin: 5%;
        }
        .blog__list__item {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-bottom: 5%;
            padding: 2%;
            border: 1px solid grey;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <x-blog.posts-list :posts="$posts"/>
</body>
</html>

