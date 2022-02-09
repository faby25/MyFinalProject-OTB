
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <span class="card-title">
                        {{ $post->title ?? 'Detalles del Post' }}
                    </span>
                </div>
                <div class="float-right">
                  <form method="post" action="posts.atendido.{{$post->id}}">
                      {{ method_field('PATCH') }}
                      @csrf
                      <input type="hidden" name="atendido" value="$post->id"/>
                      @if ($post->atendido)
                          <button class="btn btn-primary btn-success float-right" type="submit">
                            <h2 class="h2">
                              {{ "Atendido" }}
                            </h2>
                          </button>
                      @else
                        <button class="btn btn-primary btn-danger float-right" type="submit">
                          <h2 class="h2">
                            {{ "Sin Atender" }}
                          </h2>
                        </button>
                      @endif
                  </form>


                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <strong>Posteado Por:</strong>
                    {{ $post->user->name }}
                </div>
                <div class="form-group">
                    <strong>Category:</strong>
                    {{ $post->category->name }}
                </div>
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $post->title }}
                </div>
                <div class="form-group">
                    <strong>Toda la Descripcion:</strong>
                    {{ $post->body }}
                </div>
                <div class="form-group">
                    <strong>Archivos Adjuntos:</strong>
                    <img src="{{asset('./storage/'.$post->thumbnail)}}" alt="No se encontro ningun archivo" class="rounded-xl">
                </div>
            </div>
        </div>
