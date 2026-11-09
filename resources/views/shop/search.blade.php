@extends('layout')

@section('content')
    {{-- VULN-02 : XSS réfléchi — {!! !!} affiche la saisie utilisateur sans échappement --}}
    <h2>Résultats pour : {!! $q !!}</h2>
    <table>
        <tr><th>#</th><th>Produit</th><th>Prix</th></tr>
        @forelse ($results as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->price }}</td>
            </tr>
        @empty
            <tr><td colspan="3">Aucun résultat.</td></tr>
        @endforelse
    </table>
@endsection
