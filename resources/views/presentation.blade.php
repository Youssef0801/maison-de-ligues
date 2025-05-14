@include('partial.head')

{{--head--}}
<body>
        <header>
            <h1><span class="align-v" aria-hidden="true">📁 </span> Développement Web</h1> </header>
        <main>
            <section>
                <h2><span class="align-v" aria-hidden="true"></span>💻 Projet</h2>
    <p>Lorem ipsum dolor sit amet. Ea perferendis rerum ut impedit modi et libero nihil ad accusantium porro ut dicta pariatur eos eligendi obcaecati est molestias cupiditate. Ut porro fuga sit porro eveniet vel molestiae adipisci sit soluta molestiae qui maxime accusantium eum beatae dicta quo officiis cumque.

    </p>
    <a href="{{url("/")}}" class="btn-default btn-sucess" >Search</a>
    <a href="{{url("/list")}}" class="btn-default btn-sucess" >list</a>
    <a href="{{url("/contact")}}" class="btn-default btn-sucess" >Contact</a>
            </section>
            <section>
                <h2>Langages de programmation</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Langage</th>
                            <th>Type</th>
                            <th>Version</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($lang as $item)
                {{-- {{ dd($lang)}} --}}
                <tr>
                    <td>{{$item['lang']}}</td>
                    <td>{{$item['type']}}</td>
                    <td>{{$item['version']}}</td>
                </tr>
                @endforeach;
                    </tbody>
                </table>
            </section>
        </main>
        <footer>
            @include('partial.footer')
        </footer>

    </body>
 
</html>
