@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sandėlio redagavimas</div>
                    <div class="card-body">
                        @include('warehouses.error')
                        <form method="POST" action="{{ route('warehouses.update', $warehouse->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $warehouse->name)  }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Miestas</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city', $warehouse->city) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresas</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address', $warehouse->address) }}">
                            </div>
                            <button class="btn btn-success">Išsaugoti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
