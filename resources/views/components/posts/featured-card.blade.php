@props(['post'])
<article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">

    <div class="py-4 px-4 lg:flex">
        {{-- <div class="flex lg:mr-4">
          <img src="./storage/{{$post->thumbnail}}" alt="Blog Post illustration" class="rounded  h-80 w-auto">
        </div> --}}
            <div class="items-center inline-flex">
              {{-- /storage/app/public/thumbnail/ --}}
              <img src="../storage/{{$post->thumbnail}}" alt="Card Post illustration" class="rounded-xl h-80 w-auto ">

                {{-- <img src="../storage/{{$post->thumbnail}}" alt="Card Post illustration" class="rounded-xl h-80 w-auto "> --}}
            </div>

        <div class="flex-1 flex-col justify-between">
            <header class="mt-2 lg:mt-0">
                <div class="space-x-2">
                  <x-posts.category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$post->title}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">Actualizado en:
                      <time>{{$post->updated_at}} </time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                  {{$post->excerpt}}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="./images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                          <a href="/users={{$post->user->username}}">
                            {{$post->user->name}}</a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                  <a href="/posts={{$post->slug}}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Ver Más</a>
                </div>
            </footer>
        </div>
    </div>
</article>
