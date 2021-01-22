@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create new alert</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Select currency and minimum level below</h6>
                </div>
                <div class="card-body">


                    <form method="POST" action="{{ route('admin.alerts.store') }}">

                        @csrf

                        <div class="form-group">
                            <label for="currency">Select  currency:</label>
                            <select class="form-control" id="currency" name="currency">
                                <option value="">Please select...</option>
                                @foreach($currencies['symbols'] as $symbol => $name)
                                <option value="{{$symbol}}" @if (old('currency') == $symbol) selected="selected" @endif>{{$symbol . " => " . $name}}</option>
                                    @endforeach
                            </select>
                            @if ($errors->has('currency'))

                                <span class="help-block">
														<strong>{{ $errors->first('currency') }}</strong>
													</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="minimum">Set minimum level:</label>
                            <input id="price" type="text" class="form-control" name="minimum" onkeypress="return isNumber(event)" value="{{ old('minimum') }}" >
                            @if ($errors->has('minimum'))

                                <span class="help-block">
														<strong>{{ $errors->first('minimum') }}</strong>
													</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>


                </div>
            </div>

        </div>

    </div>

@endsection
