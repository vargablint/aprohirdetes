@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hitelesisd az emailt címed </div>  <!--{{ __('Verify Your Email Address') }}-->

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Egy frissebb megerősítési link el lett küldve az emailedre                     <!--{{ __('A fresh verification link has been sent to your email address.') }} -->
                        </div>
                    @endif

                    A tovább haladáshoz, kérlek nézd meg az emailed, és fogadd el a megerősítést az emailodról<!--{{ __('Before proceeding, please check your email for a verification link.') }}-->
                    Ha nem fogadtad el az emailed<!--{{ __('If you did not receive the email') }},-->
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Kattints ide egy másik megerősítőlinkért</button>. <!-- {{ __('click here to request another') }}-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
