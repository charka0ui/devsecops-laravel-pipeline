@extends('layout')

@section('content')
    <h2>Nos produits</h2>
    <table>
        <tr><th>Produit</th><th>Description</th><th>Prix</th></tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ number_format($product->price, 2, ',', ' ') }} €</td>
            </tr>
        @endforeach
    </table>
@endsection
