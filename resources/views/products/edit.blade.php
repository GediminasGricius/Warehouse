@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Produkto redagavimas</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kiekis</label>
                                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sandėlys</label>

                               <select name="warehouse_id" class="form-select" >
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" {{ ($warehouse->id==$product->warehouse_id)?'selected':'' }}  >
                                        {{ $warehouse->name }} ({{ $warehouse->city }})
                                    </option>
                                @endforeach
                               </select>
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">Produkto paveikslas</div>
                    <div class="card-body">
                        @if ($product->image==null)
                        <form method="post" action="{{ route('products.addImage', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Produkto paveikslas</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Pridėti</button>
                        </form>
                        @else
                            <div class="mb-2 text-center">
                                <img src="{{ route('product.showImage',$product->id) }}" width="200" >
                            </div>
                            <div class="text-center">
                                <a href="{{ route('products.deleteImage', $product->id) }}" class="btn btn-danger" >Ištrinti</a>
                            </div>
                        @endif

                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
