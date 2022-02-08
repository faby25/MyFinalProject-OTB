@props(['posts'])
@php $c=-1; @endphp
@for ($i=0; $i < $posts->count(); $i++)
  @if ($posts[$i]->user->is_admin)
        <x-posts.featured-card :post="$posts[$i]"/>
        @php $c=$i;$i=$posts->count();@endphp
  @endif
@endfor
<div class="lg:grid lg:grid-cols-3 space-x-2 space-y-2">
@if($posts->count()>$c)
    @foreach ($posts->skip($c+1) as $post)
      @if ($post->user->is_admin)
         <x-posts.card
           :post="$post"
           class="{{$loop->iteration<3? 'col-span-3' : 'col-span-2'}}"
          />
     @endif
     @endforeach
@endif
</div>

@if ($c==-1)
        <p class="text-center">No se encontro ningun post, vuelva más tarde</p>
@endif
