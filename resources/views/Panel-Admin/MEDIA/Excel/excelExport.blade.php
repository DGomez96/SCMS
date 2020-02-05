<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productos as $product)
        <tr>
            <td>{{ $product->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>