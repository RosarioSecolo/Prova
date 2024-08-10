<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">{{$category->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($articles as $article)
                <x-card :article="$article"/>
            @endforeach
            </div> 
        </div>
    </div>
</x-layout>