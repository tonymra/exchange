
@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Exchange Rate Alert',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p>Dear {{$user_name}},</p>

    <p>The exchange rate for {{$alert->user->base_currency}}/{{$alert->currency}} has gone below {{$alert->minimum}}.</p>

    <p>The rate is currently {{$alert_level}}</p>



    <p>Regards,</p>

    <h3>Exchange Tool</h3>

    @include('beautymail::templates.sunny.contentEnd')


    @include('beautymail::templates.sunny.contentStart')

    <p><small>Confidentiality Note: This communication is intended for the addressee only, is privileged and confidential and unauthorised dissemination or copying is prohibited. If you have received this communication in error, please notify us immediately and please destroy the original message.
            <br>As e-mail communication is subject to possible corruption, it is normally inappropriate to rely on advice contained in an e-mail without obtaining written confirmation of such advice.</small></p>



    @include('beautymail::templates.sunny.contentEnd')

@stop