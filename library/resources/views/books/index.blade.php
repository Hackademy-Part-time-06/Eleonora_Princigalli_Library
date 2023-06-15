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
            @if (Auth::user())
                <h3>Ciao {{ Auth::user()->name }}, questi sono i nostri libri</h3>
            @else
                <h3>Elenco Libri inseriti </h3>
            @endif


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
                    <th scope="col">Categorie</th>


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
                            @foreach ($book->categories as $category)
                                <li>{{ $category->name }} </li>
                            @endforeach

                        <td>
                            <a href="{{ route('books.show', ['book' => $book['id']]) }}">
                                Visualizza
                            </a>
                        </td>
                        @auth
                            @if ($book['user_id'] == Auth::user()->id)
                                <td>
                                    <a href="{{ route('books.edit', ['book' => $book['id']]) }}">
                                        Modifica
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('books.destroy', ['book' => $book['id']]) }}" method="POST"
                                        id="delete-{{ $book['id'] }}">
                                        @csrf
                                        @method('delete')
                                        <a href="#"
                                            onclick="event.preventDefault(); document.querySelector('#delete-{{ $book['id'] }}').submit();">Cancella</a>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @empty
                    <tr colspan="4"> </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main>
