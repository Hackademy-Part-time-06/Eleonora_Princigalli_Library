<x-main>
    <div class="container py-4 ">
    
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome categoria</label>

                
                <input class="form-control" name="name" type="text" placeholder="inserisci nome" value="{{ old('title') }}" />


                <label class="form-label">Elenco libri </label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title  }}</option>
                    @endforeach
                </select>
            </div>
            
    

    
            <div class="d-grid">
                <button class="btn btn-primary btn-lg p-2" type="submit">Invia</button>
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
    