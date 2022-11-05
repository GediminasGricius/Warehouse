@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Naujas sandėlys</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('warehouses.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Miestas</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresas</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
