{{-- Post errors --}}
@if ($errors->any())
    <div class="container d-flex justify-content-center align-items-center flex-column">    
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger col-md-8" role="alert">
                {{ $error }}   
            </div>
        @endforeach  
    </div>  
@endif
@if(session()->has('upload-error'))
    <div class="alert alert-danger">
        Falha no upload do arquivo...
    </div>
@endif 

{{-- User errors --}}
@if(session()->has('confirmation-fail'))
    <div class="alert alert-danger" role="alert">
        {{ session('confirmation-fail') }}
    </div>
@elseif(session()->has('upload-error'))
    <div class="alert alert-danger">
        {{ session('upload-error')}}
    </div>
@elseif(session()->has('user-error'))
    <div class="alert alert-danger" role="alert">
        {{ session('user-error') }}
    </div>
@endif