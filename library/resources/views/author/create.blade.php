<x-main>
    <div class="container py-4 ">
    
        <form action="{{ route('authors.store') }}" method="POST" >
            @method('post')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control" name="name" type="text" placeholder="inserisci nome" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label class="form-label">Cognome</label>
                <input class="form-control" name="surname" type="text" placeholder="inserisci cognome" value="{{ old('surname') }}" />
            </div>
            <div class="mb-3">
                <label class="form-label">Data di nascita</label>
                <input class="form-control" name="birthday" type="date" placeholder="inserisci data di nascita" value="{{ old('birthday') }}" />
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
    