<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>WordRem</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        
        <div>
            <a href="/">戻る</a>
        </div>
        
        
        
        
<form action="/posts" method="POST">
            @csrf

<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Create</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">覚えたいワードとその説明文を入力してください</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Word</label>
            <input type="text" id="name" name="post[title]" value="{{ old('post.title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Explain</label>
            <textarea id="message" name="post[body]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('post.body') }}</textarea>
          </div>
        </div>
        
        <div class="hidden">
            <input type="hidden" name="post[user_id]" value="{{Auth::user()->id}}"/>
        </div>
        <div class="p-2 w-full">
          
          <input type="submit" value="Save" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"/>
        </div>
      
      </div>
    </div>
  </div>
</section>
        
        
</form>
        
    </body>
</html>