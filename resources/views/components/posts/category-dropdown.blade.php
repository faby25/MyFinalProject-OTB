<x-posts.dropdown>
  @php
    $categories=App\Models\Category::all();
  @endphp
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory)? ucwords($currentCategory->name):'Categorías'}}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">Ver Todo</x-dropdown-item>
    @foreach ($categories as $category)
      <x-dropdown-item
            href="/categories={{$category->slug}}"
            :active='request()->is("categories/.{$category->slug}")'
      >{{ucwords($category->name)}}
      </x-dropdown-item>
    @endforeach
</x-posts.dropdown>
