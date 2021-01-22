@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Setup Alerts</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            @if (session('alert_updated'))

                <div class="alert alert-primary" role="alert">
                    {{ session('alert_updated') }}
                </div>

            @endif

                @if (session('alert_added'))

                    <div class="alert alert-success" role="alert">
                        {{ session('alert_added') }}
                    </div>

                @endif

                @if (session('alert_deleted'))

                    <div class="alert alert-danger" role="alert">
                        {{ session('alert_deleted') }}
                    </div>

                @endif


                <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <p>This section enabled you to receive an email notification when the currency exchange rate goes beyond the minimum specified. The exchange rates are compared against your base currency.</p>
                    <a href="{{route('admin.alerts.create')}}"><button class="btn btn-success">Add new alert</button></a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">Currency</th>
                            <th scope="col">Minimum</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($alerts)>0)
                            @foreach($alerts as $alert)
                        <tr>

                            <td>{{isset($alert->currency) ? $alert->currency:"N/A"}}</td>
                            <td>{{isset($alert->minimum) ? $alert->minimum:"N/A"}}</td>
                            <td>
                                <a href="{{route('admin.alerts.edit',$alert->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>

                                <form method="POST" action="{{ route('admin.alerts.destroy', $alert->id) }}" >

                                    {{ method_field('DELETE') }}

                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger ">Delete</button>

                                </form>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
