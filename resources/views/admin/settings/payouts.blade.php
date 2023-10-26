@extends('admin.layouts.app')
@section('title', 'Admin Setting')
@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payouts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Stripe</h3>
                            </div>
                            <form class="category-form" method="post"  action="{{route('settings')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Stripe Payout Account</label>
                                                @if(\Illuminate\Support\Facades\Auth::user()->stripe_account_id)
                                                    <span class="badge badge-pill badge-success">Connected</span>
                                                    <br />
                                                    <a type="button" href="{{route('admin.connectStripePayoutAccount')}}" class="btn btn-success btn-sm">Reconnect</a>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Not Connected</span>
                                                    <br />
                                                    <a type="button" href="{{route('admin.connectStripePayoutAccount')}}" class="btn btn-success btn-sm">Connect</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- /.card-body -->
                                            <div class="card-footer float-right">
                                                <button type="submit" onclick="validateinputs()" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{URL::asset('admin/custom_js/custom.js')}}"></script>
@endsection

