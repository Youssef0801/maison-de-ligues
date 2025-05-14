
@include('partial.head')

{{--head--}}
        <header>
            <h1><span class="align-v" aria-hidden="true">📁 </span> Développement Web</h1> </header>
<body>
    <section>
        <h2><span class="align-v" aria-hidden="true"></span>Contact</h2>
    </section>

    <!-- Afficher le message de succès -->
    @if(session('success'))
        <p class="warning">
            {{ session('success') }}
        </p>
    @endif

    <!-- Formulaire d'inscription -->
    <main>
    <fieldset>
        <section>
            <a href="{{url("/")}}" class="btn-default btn-sucess" >Search</a>
            <a href="{{url("/list")}}" class="btn-default btn-sucess" >list</a>
            <a href="{{url("/presentation")}}" class="btn-default btn-sucess" >Presentation</a>

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" placeholder="Votre email" required>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Votre mot de passe" required>
        </div>

        <button class="btn-default btn-primary" type="submit">S'inscrire</button>
    </form>
    </section>
    </fieldset>
</main>
    @include('partial.footer')
</body>
</html>

