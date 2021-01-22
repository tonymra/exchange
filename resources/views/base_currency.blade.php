@extends('layouts.app')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Base Currency</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update your base currency </h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('base.currency.update') }}">

                        @csrf


                        <div class="form-group">
                            <label for="base_currency">Select  currency below:</label>
                            <select class="form-control" id="base_currency" name="base_currency">
                                <option value="">Please select...</option>
                                @foreach($currencies['symbols'] as $symbol => $name)

                                    <option value="{{$symbol}}" {{ Auth::user()->base_currency == $symbol ? 'selected':'' }}>{{$symbol . " => " . $name}}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('base_currency'))


                                <span class="help-block">
											<strong>{{ $errors->first('base_currency') }}</strong>
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
