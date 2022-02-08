@props(['posts'])


@php $c=0;;@endphp
@for ($i=0; $i < $posts->count(); $i++)
  @if ($posts[$i]->user->is_admin=='0')
    <x-posts.featured-card :post="$posts[$i]"/>
    @php $c=$i;$i=$posts->count();@endphp
  @endif
@endfor
@if($posts->count()>$c)
  <div class="lg:grid lg:grid-cols-3">
    @foreach ($posts->skip($c+1) as $post)
      @if (!$post->user->is_admin)
         <x-posts.card
           :post="$post"
           class="{{$loop->iteration<3? 'col-span-3' : 'col-span-2'}}"/>
     @endif
    @endforeach
  </div>
@endif
