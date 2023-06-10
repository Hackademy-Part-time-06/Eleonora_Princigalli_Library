<x-main>
<div class="container py-4 ">

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input class="form-control" name="title" type="text" placeholder="inserisci titolo" value="{{ old('title') }}" />
        </div>


        <div class="mb-3">
            <label class="form-label">Pagine</label>
            <input class="form-control" name="pages" type="numeric" placeholder="" value="{{ old('pages') }}" />
        </div>

        <div class="mb-3">
            <label class="form-label">Autore</label>

            <select name="author_id" id="author_id" class="form-control">
                @foreach($authors as $author) 
                <option value="{{ $author->id }}">{{ $author->name . ' ' . $author->surname }}</option>
                @endforeach
            </select>

        
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="book_id" id="book_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name  }}</option>
                @endforeach
            </select>
            
        </div>

        <div class="mb-3">
            <label class="form-label">Anno</label>
            <input class="form-control" name="year" type="numeric" placeholder="" value="{{ old('year') }}" />
        </div>

        <div class="mb-3">
            <label class="form-label">Immagine</label>
            <input class="form-control" name="image" id="image" type="file" placeholder=""  />
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
