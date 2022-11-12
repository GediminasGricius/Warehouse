@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Naujas sandėlys</div>
                    <div class="card-body">

                        @include('warehouses.error')

                        <form method="POST" action="{{ route('warehouses.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text"  class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name')  }}">
                                @error('name')
                                <div class="alert alert-danger mt-1">
                                    @foreach($errors->get('name') as $error)
                                        {!!  $error  !!}
                                    @endforeach
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Miestas</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city')  }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresas</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address')  }}">
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
