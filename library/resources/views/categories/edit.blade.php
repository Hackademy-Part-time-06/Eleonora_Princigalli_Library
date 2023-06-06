<x-main>
    <div class="container py-4 ">
    
        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control" name="name" type="text"  value="{{ $book -> title }}" />
            </div>
         
            
            <div class="d-grid">
                <button class="btn btn-primary btn-lg p-2" type="submit">Salva</button>
            </div>
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    
    </div>
    
    </body>
    </x-main>
    