<x-main>
    <div class="container py-4 ">
    
        <form action="{{ route('login') }}" method="POST" >
            @method('post')
            @csrf
           
    
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" type="email" placeholder="inserisci la tua email" value="{{ old('pages') }}" />
            </div>
    
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Inserisci password" />
            </div>
    

            <div class="d-grid">
                <button class="btn btn-primary btn-lg p-2" type="submit">Invia</button>
            </div>

            <div class="py-5"> Non sei registrato? 
                <a href="{{route('register')}}" class="btn btn-outline-dark" type="button">clicca qui</a>

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
    