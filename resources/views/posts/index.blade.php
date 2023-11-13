<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Word</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        @vite('resources/css/app.css')
    </head>
    <body>
        
        
        
        
<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="-my-8 divide-y-2 divide-gray-100">
      
      <button class="inline-flex text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded relative right-0"><a href='/posts/create'>create</a></button>
      
      @foreach ($posts as $post)
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          
        </div>
        
        <div class="md:flex-grow">
          <h2 class="text-2xl text-indigo-500 font-medium text-gray-900 title-font mb-2"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
          <p class="leading-relaxed">{{ $post->body }}</p>
          <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
          <a href="/posts/{{ $post->id }}" class="text-indigo-500 inline-flex items-center mt-4">Learn More
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        
      </div>
      @endforeach
      
      
    </div>
  </div>
  <div class='paginate'>{{ $posts->links() }}</div>
  
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