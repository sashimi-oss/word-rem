<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        
        <div class="com-pos">
            <form action="/comments" method="POST">
            @csrf
                <h3>コメントをする</h3>
                <textarea name="comment[comment]"></textarea>
                <input type="hidden" name="comment[post_id]" value="{{$post->id}}" />
                <input type="hidden" name="comment[user_id]" value="{{Auth::user()->id}}" />
                <input type="submit" value="コメントする"/>
            </form>
        </div>
                
        <div class="comment">
            <h3>コメント</h3>
            @foreach ($comment as $com)
                <p>
                    {{$com->comment}}
                    <form action="/comments/{{ $com->id }}" id="form_{{ $com->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $com->id }})">delete</button> 
                    </form>
                </p>
            @endforeach
        </div>
        
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
</html>