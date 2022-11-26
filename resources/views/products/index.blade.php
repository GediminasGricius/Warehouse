@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sandėlių sąrašas</div>
                    <div class="card-body">

                        <form action="{{ route('products.search') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="search" placeholder="Ieškoma prekė" value="{{ $search }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success">Ieškoti</button>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="{{ route('product.filter') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <select class="form-select" name="filter_warehouse">
                                        <option value=""  {{ ($filter_warehouse==null)?'selected':'' }}>-</option>
                                        @foreach($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"  {{ ($warehouse->id==$filter_warehouse)?'selected':'' }}>{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success">Filtruoti</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('products.search.reset') }}" class="btn btn-warning">Išvalyti</a>
                                </div>
                            </div>
                        </form>
                        <hr>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Produkto paveikslas</th>
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
                                    <td>

                                        @if ($product->image!=null)
                                            <div class="mb-2 text-center">
                                                <img src="{{ route('product.showImage',$product->id) }}" width="100" >
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('product.downloadImage',$product->id) }}" class="btn btn-success" >Parsiųsti</a>
                                            </div>
                                        @endif

                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->warehouse->name }}</td>
                                    <td>{{ $product->warehouse->city }}</td>
                                    <td>
                                        @can('update',$product)
                                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-success">Redaguoti</a>
                                        @endcan
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
