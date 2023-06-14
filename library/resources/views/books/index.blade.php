<x-main>
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="align-middle gap-2 d-flex justify-content-between">
            <h3>Elenco Libri inseriti da {{Auth::user()->name}} </h3>
            <a href="{{ route('books.form') }}" class="btn btn-primary " type="button">Crea Nuovo Libro</a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Pagine</th>
                    <th scope="col">Anno</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <th scope="row">{{ $book['id'] }}</th>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book['pages'] }}</td>
                        <td>{{ $book['year'] }}</td>  
                           
                        <td>
                            <a href="{{ route('books.show', ['book' => $book['id']]) }}">
                                Visualizza
                            </a>
                        </td>
                        @auth
                            <td>
                                <a href="{{ route('books.edit', ['book' => $book['id']]) }}">
                                    Modifica
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('books.destroy', ['book' => $book['id']]) }}" method="POST"
                                    id="delete-{{$book['id']}}">
                                    @csrf
                                    @method('delete')
                                    <a href="#"
                                        onclick="event.preventDefault(); document.querySelector('#delete-{{$book['id']}}').submit();">Cancella</a>
                                </form>
                            </td>
                        @endauth

                    </tr>
                @empty
                    <tr colspan="4"> </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main>
