<x-layout>
  @include('home.header')
  <main class="max-w-6xl mx-auto mt-5 lg:mt-8 space-y-5">
        <x-posts.detail-card :post="$post"/>
    </main>
    @include('home.footer')
</x-layout>
