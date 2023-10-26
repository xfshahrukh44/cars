@extends('admin.layouts.app')
@section('title', 'Admin Goal')
@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Goal Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Goal</li>
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
                                <h3 class="card-title">Site Goals</h3>
                            </div>
                            <form class="category-form" method="post" action="{{route('admin.goals')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach($goals as $key => $goal)
                                                <div class="form-group">
                                                    <label for="name">Grade {{$key + 1}}: {{$goal->name}}</label>
                                                    <input type="hidden" value="{{$goal->id}}" name="goal_ids[]">
                                                    <input type="text" class="form-control" name="goal_targets[]" id="name"
                                                           value="{{$goal->target}}" placeholder="site title"
                                                           required>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="col-md-12">
                                            <!-- /.card-body -->
                                            <div class="card-footer float-right">
                                                <button type="submit" onclick="validateinputs()"
                                                        class="btn btn-primary">Submit
                                                </button>
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

