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

@if (session('base_currency_updated'))


    <div class="alert alert-success" role="alert">
        {{ session('base_currency_updated') }}
    </div>

@endif

@if(Auth::user()->base_currency == "")

    <div class="alert alert-warning" role="alert">
        You are currently viewing exchange rates for the default base currency - EUR.
    </div>
@endif
