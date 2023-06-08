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
            <h3>Elenco autori inseriti</h3>
            <a href="{{route('authors.create')}}" class="btn btn-primary " type="button">Crea un nuovo autore</a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Data di nascita</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                <tr>
                    <th scope="row">{{$author['id']}}</th>

                    <td>{{$author['name']}}</td>

                    <td>{{$author['surname']}}</td>
                    
                    <td>{{$author['birthday']}}</td>




                    
                    <td>
                        <a href="{{ route('authors.edit', ['author' => $author['id']]) }}">
                            Modifica
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('authors.destroy', ['author' => $author['id']]) }}" method="POST"
                            id="delete">
                            @csrf
                            @method('delete')
                            <a href="#"
                                onclick="event.preventDefault(); document.querySelector('#delete').submit();">Cancella</a>
                        </form>
                    </td>
               
                </tr>
                @empty
                <tr colspan="4"> 
                    
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main>