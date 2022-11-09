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
                                <th>Kiekis</th>
                                <th>Sandėlys</th>
                                <th>Miestas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->warehouse->name }}</td>
                                    <td>{{ $product->warehouse->city }}</td>
                                    <td>
                                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-success">Redaguoti</a>
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
