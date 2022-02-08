<x-posts.dropdown>
  @php
    $meters=App\Models\Meter::all();
  @endphp
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentMeter)? ucwords($currentmeter->nombre):'Categorías'}}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">Ver Todo</x-dropdown-item>
    @foreach ($meters as $meter)
      <x-dropdown-item
            href="/meters={{$meter->id}}"
            :active='request()->is("meters/.{$meter->id}")'
      >{{ucwords($meter->name)}}
      </x-dropdown-item>
    @endforeach
</x-posts.dropdown>
