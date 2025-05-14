@include('partial.head')

<body>
    <h1 style="text-align: center;">Liste des articles</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }} €</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{url("/")}}" class="btn-default btn-sucess" >Search</a>

</body>
</html>
