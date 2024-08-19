<x-layout>
    @if(session('alert'))
        <div class="alert alert-danger custom-alert">
            {{session('alert')}}
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success text-center mx-auto" style="max-width: 600px; height:50px">
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
    <script>
    setTimeout(function() {
        document.querySelector('.alert-success').style.display = 'none';
    }, 3000); // nasconde il messaggio dopo 5 secondi
    </script>
</x-layout>

