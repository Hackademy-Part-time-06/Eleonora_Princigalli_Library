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
            <h3>Elenco categorie inseriti</h3>
            <a href="{{route('categories.create')}}" class="btn btn-primary " type="button">Crea una nuova categoria</a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{$category['id']}}</th>
                    <td>{{$category['name']}}</td>
               
                    <td>
                        <a href="{{route('categories.show', ['category' => $category['id']])}}">
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