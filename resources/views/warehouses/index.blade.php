@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('warehouses.warehouses_list') }}</div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('warehouses.name') }}</th>
                                <th>{{ __('warehouses.city') }}</th>
                                <th>{{ __('warehouses.address') }}</th>
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
                                        <a class="btn btn-success" href="{{ route("warehouses.edit", $warehouse->id) }}" >{{ __('warehouses.edit') }}</a>
                                    </td>

                                    <td style="width: 100px;">
                                        <form method="POST" action="{{ route("warehouses.destroy", $warehouse->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">{{ __('warehouses.delete') }}</button>
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
