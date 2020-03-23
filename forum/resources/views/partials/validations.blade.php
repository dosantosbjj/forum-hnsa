{{-- Mensagens de validação --}}
@if(session()->has('post-success'))
    <div class="alert alert-success sm" role="alert">
        Post criado com sucesso!
    </div>
@endif
@if(session()->has('delete-success'))
    <div class="alert alert-success sm" role="alert">
        Post deletado com sucesso!
    </div>
@elseif(session()->has('unauthorized'))
    <div class="alert alert-fail sm" role="alert">
        Seu usuário não é autorizado...
    </div>
@endif
@if(session()->has('edit-success'))
    <div class="alert alert-success sm" role="alert">
        Post editado com sucesso!
    </div>
@endif
@if(session()->has('edit-error'))
    <div class="alert alert-fail sm" role="alert">
        Post editado com sucesso!
    </div>
@endif
@if(session()->has('comment-success'))
        <div class="alert alert-success" role="alert">
            Comentário cadastrado com sucesso!
        </div>
    @endif