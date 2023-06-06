<x-main>
    <div class="container py-4 ">
    
        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="form-label">Titolo</label>
                <input class="form-control" name="title" type="text" placeholder="inserisci titolo" value="{{ $book -> title }}" />
            </div>
    
    
            <div class="mb-3">
                <label class="form-label">Pagine</label>
                <input class="form-control" name="pages" type="numeric" placeholder="" value="{{ $book -> pages }}" />
            </div>
    
            <div class="mb-3">
                <label class="form-label">Autore</label>
                <input class="form-control" name="author" type="numeric" placeholder="Inserisci autore" value="{{ $book -> author }}" />
            </div>
    
            <div class="mb-3">
                <label class="form-label">Anno</label>
                <input class="form-control" name="year" type="numeric" placeholder="" value="{{ $book -> year}}" />
            </div>
    
            <div class="mb-3">
                <label class="form-label">Immagine</label>
                <input class="form-control" name="image" id="image" type="file" placeholder=""  />
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
    