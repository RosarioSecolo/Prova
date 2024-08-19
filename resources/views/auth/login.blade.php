<x-layout>
    <div class="container-fluid p-5 bg-secondary text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-white">Benvenuto di Nuovo!</h1>
                <p class="lead text-white">Accedi al tuo account per continuare.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <form action="{{ route('login') }}" method="POST" class="card p-5 shadow-lg bg-light" style="max-width: 90%; margin: auto;">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-secondary btn-lg w-100">Accedi</button>
                        <p class="mt-3">Non sei registrato? <a href="{{ route('register') }}" class="text-secondary fw-bold">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>