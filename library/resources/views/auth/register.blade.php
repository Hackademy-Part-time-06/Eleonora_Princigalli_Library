<x-main>
    <div class="container py-4 ">
    
        <form action="{{ route('register') }}" method="POST" >
            @method('post')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control" name="name" type="text" placeholder="inserisci il tuo nome" value="{{ old('title') }}" />
            </div>
    
    
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" type="email" placeholder="inserisci la tua email" value="{{ old('pages') }}" />
            </div>
    
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Inserisci password" />
            </div>
    
            <div class="mb-3">
                <label class="form-label">Conferma password</label>
                <input class="form-control" name="password_confirmation" type="password" placeholder="Inserisci nuovamente password"  />
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
    