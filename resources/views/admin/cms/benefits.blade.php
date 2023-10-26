@extends('admin.layouts.app')
@section('title', 'CMS')
@section('section')
    <style>
        .img-upload #image-preview {
            width: 240px;
            height: 240px;
            border: 1px dashed #000;
            color: #ecf0f1;
            position: relative;
            background-repeat: no-repeat !important;
            background-position: center !important;
        }

        .img-upload #image-preview input {
            width: 120px;
            height: 40px;
            z-index: 10;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translateX(-50%);
            margin-left: 0px;
            cursor: pointer;
            opacity: 0;
        }

        .img-upload #image-preview label {
            padding: 0px;
            z-index: 5;
            width: 130px;
            height: 40px;
            background-color: #ffffff;
            color: #143250;
            font-size: 14px;
            line-height: 40px;
            top: 60%;
            left: 50%;
            transform: translateX(-50%);
            right: 0;
            margin-left: 0px;
            bottom: 0px;
            margin-bottom: 0px;
            text-align: center;
            position: absolute;
            cursor: pointer;
            -webkit-transition: all 0.3s ease-in;
            -o-transition: all 0.3s ease-in;
            transition: all 0.3s ease-in;
            /* box-shadow: 0px 0px 15px #eaeaea; */
            box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Benefits Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Benefits</a></li>
                            <li class="breadcrumb-item active">Benefits</li>
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
                                <h3 class="card-title">Benefits Form</h3>
                            </div>
                            <form class="category-form" method="post" action="{{route('admin.cms.benefits')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3>Banner</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Banner Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{ $data->banner_image }});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="banner_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Circle Title</label>
                                            <input type="text" class="form-control" name="banner_circle_title"
                                                   value="{{$data->banner_circle_title}}" required>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3>Section 2</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{ $data->section_2_image }});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_2_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="section_2_title"
                                                   value="{{$data->section_2_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Description</label>
                                            <input type="text" class="form-control" name="section_2_description_line_1"
                                                   value="{{$data->section_2_description_line_1}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_2_description_line_2"
                                                   value="{{$data->section_2_description_line_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_2_description_line_3"
                                                   value="{{$data->section_2_description_line_3}}" required
                                            >
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3>Section 3</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{ $data->section_3_image }});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_3_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="section_3_title"
                                                   value="{{$data->section_3_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Description</label>
                                            <input type="text" class="form-control" name="section_3_description"
                                                   value="{{$data->section_3_description}}" required
                                            >
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3>Section 4</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{ $data->section_4_image }});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_4_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="section_4_title"
                                                   value="{{$data->section_4_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Description</label>
                                            <input type="text" class="form-control" name="section_4_description_line_1"
                                                   value="{{$data->section_4_description_line_1}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_4_description_line_2"
                                                   value="{{$data->section_4_description_line_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Title 2</label>
                                            <input type="text" class="form-control" name="section_4_title_2"
                                                   value="{{$data->section_4_title_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Image 2</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{ $data->section_4_image_2 }});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_4_image_2" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Title 3</label>
                                            <input type="text" class="form-control" name="section_4_title_3"
                                                   value="{{$data->section_4_title_3}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Description 2</label>
                                            <input type="text" class="form-control" name="section_4_description_2_line_1"
                                                   value="{{$data->section_4_description_2_line_1}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_4_description_2_line_2"
                                                   value="{{$data->section_4_description_2_line_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_4_description_2_line_3"
                                                   value="{{$data->section_4_description_2_line_3}}" required
                                            >
                                        </div>


                                        <div class="card-footer float-right">
                                            <button type="submit" onclick="validateinputs()"
                                                    class="btn btn-primary">Submit
                                            </button>
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
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        window.onload = function () {
            CKEDITOR.replace('description', {
                {{--filebrowserUploadUrl: '{{ route('project.document-image-upload',['_token' => csrf_token() ]) }}',--}}
                {{--filebrowserUploadMethod: 'form'--}}
            });
        }
        $(document).ready(function () {
            // IMAGE UPLOADING :)
            $(".img-upload").on("change", function () {
                var imgpath = $(this).parent();
                var file = $(this);
                readURL(this, imgpath);

            });

            function readURL(input, imgpath) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        imgpath.css('background', 'url(' + e.target.result + ')');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
@endsection

