<x-main>
    <div class="container mt-5">

        @if (session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{session('success')}}
            </div>
        </div>
        @endif
        <div class="align-middle gap-2 d-flex justify-content-between">
            <h3>Elenco Libri inseriti</h3>
            <a href="{{route('books.form')}}" class="btn btn-primary " type="button">Crea Nuovo Libro</a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Pagina</th>
                    <th scope="col">Anno</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <th scope="row">{{$book['id']}}</th>
                    <td>{{$book['title']}}</td>
                    <td>{{$book['author']}}</td>
                    <td>{{$book['pages']}}</td>
                    <td>{{$book['year']}}</td>
                    <td>
                        <a href="{{route('books.show', ['book' => $book['id']])}}">
                            Visualizza
                        </a>
                    </td>
                </tr>
                @empty
                <tr colspan="4"> </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main>