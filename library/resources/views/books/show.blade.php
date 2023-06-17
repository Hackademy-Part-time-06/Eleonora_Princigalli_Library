
<x-main>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ Storage::url($book->image)}}"
                        alt="..."></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{$book->title}}</h1>
                    <p>Autore: {{$book->author->name}} </p> 
                    <p>Numero Pagine: {{$book->pages}} </p>
                    <p>Anno di uscita: {{$book->year}} </p>
                    <p>Categorie:
                        @foreach ($book->categories as $category ) 
                        @if($loop->last)
                        {{$category->name}}
                        @else
                        {{$category->name . ', '}}
                        @endif
                      {{-- l'if ce l'ho messo solo per la virgola  --}}
                            
                        @endforeach
                    
                    
                    
                    </p>

                </div>
            </div>
        </div>
    </section>
</x-main>