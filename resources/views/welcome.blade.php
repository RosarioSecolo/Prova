<x-layout>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        <div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach($articles as $article)
            <x-card :article="$article"/>
            @endforeach
        </div>
    </div>
</x-layout>

