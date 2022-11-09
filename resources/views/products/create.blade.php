@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pridėti naują produktą</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kiekis</label>
                                <input type="text" class="form-control" name="quantity">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sandėlys</label>

                               <select name="warehouse_id" class="form-select">
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }} ({{ $warehouse->city }})</option>
                                @endforeach
                               </select>
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
