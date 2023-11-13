<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>
    <body>


        <div>
            <a href="/">戻る</a>
        </div>
        
        
        
<section class="text-gray-600 body-font">
  
</section>



 
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
      
      
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $post->title }}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $post->body }}</p>
    </div>
    
    <div class="container px-5 mx-auto">
        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="/posts/{{ $post->id }}/edit">edit</a></button>
    </div>
    
<form action="/comments" method="POST">
 @csrf
    
    <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
        <div class="relative flex-grow w-full">
          <label for="full-name" class="leading-7 text-sm text-gray-600">コメント</label>
          <input type="text" id="full-name" name="comment[comment]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          <input type="hidden" name="comment[post_id]" value="{{$post->id}}" />
          <input type="hidden" name="comment[user_id]" value="{{Auth::user()->id}}" />
        </div>
        
        <input type="submit" value="Submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"/>
    </div>

</form>


  </div>
</section>










<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="-my-8 divide-y-2 divide-gray-100">
      
     
      
      @foreach ($comment as $com)
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          
        </div>
        
        <div class="md:flex-grow">
          
          <p class="leading-relaxed">{{ $com->comment }}</p>
            <form action="/comments/{{ $com->id }}" id="form_{{ $com->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $com->id }})" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">delete</button> 
            </form>
          
        </div>
        
      </div>
      @endforeach
      
      
    </div>
  </div>
  
  
</section>
        
        
        
        
        
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