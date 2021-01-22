@extends('layouts.app')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">

            @include('includes.alerts')


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <strong>{{$base_currency}}</strong> Exchange Rates
                    </h6>
                </div>
                <div class="card-body">

                    @if(isset($currencies['rates']))

                    <ul class="list-group">


                        @foreach($currencies['rates'] as $currency => $rate)

                            <li class="list-group-item">{{$currency . " => " . $rate}}</li>
                        @endforeach


                    </ul>

                        @else

                        <p style="color:darkred">Please choose another base currency. Please note that not all currencies are supported on the free plan.</p>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
