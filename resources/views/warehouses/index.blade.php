@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sandėlių sąrašas</div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Miestas</th>
                                <th>Adresas</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $warehouse)
                                <tr>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->city }}</td>
                                    <td>{{ $warehouse->address }}</td>
                                    <td>{{ $warehouse->products->count() }}</td>
                                    <td>{{ $warehouse->products->sum('quantity') }}</td>
                                    <td>
                                        @foreach( $warehouse->products as $product)
                                            {{ $product->name }} ( {{ $product->quantity }} )
                                        @endforeach
                                    </td>

                                    <td style="width: 100px;">
                                        <a class="btn btn-success" href="{{ route("warehouses.edit", $warehouse->id) }}" >Redaguoti</a>
                                    </td>

                                    <td style="width: 100px;">
                                        <form method="POST" action="{{ route("warehouses.destroy", $warehouse->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after_jquery')
    <script>

    </script>
@endsection
