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
                        <h1>Home Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Home</li>
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
                                <h3 class="card-title">Home Form</h3>
                            </div>
                            <form class="category-form" method="post" action="{{route('admin.cms.home')}}" enctype="multipart/form-data">
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
                                        <div class="form-group col-md-4">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="section_2_title"
                                                   value="{{$data->section_2_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 1 Text</label>
                                            <input type="text" class="form-control" name="section_2_element_1_text"
                                                   value="{{$data->section_2_element_1_text}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 2 Text</label>
                                            <input type="text" class="form-control" name="section_2_element_2_text"
                                                   value="{{$data->section_2_element_2_text}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 3 Text</label>
                                            <input type="text" class="form-control" name="section_2_element_3_text"
                                                   value="{{$data->section_2_element_3_text}}" required
                                            >
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3>Benefits</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                   value="{{$data->title}}" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Element 1 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->element_1_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="element_1_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 1 Title</label>
                                            <input type="text" class="form-control" name="element_1_title"
                                                   value="{{$data->element_1_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Element 1 Description</label>
                                            <input type="text" class="form-control" name="element_1_description_line_1"
                                                   value="{{$data->element_1_description_line_1}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="element_1_description_line_2"
                                                   value="{{$data->element_1_description_line_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="element_1_description_line_3"
                                                   value="{{$data->element_1_description_line_3}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Element 2 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->element_2_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="element_2_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 2 Title</label>
                                            <input type="text" class="form-control" name="element_2_title"
                                                   value="{{$data->element_2_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Element 2 Description</label>
                                            <textarea class="form-control" name="element_2_description" rows="4" required
                                            >{{$data->element_2_description}}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Element 3 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->element_3_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="element_3_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 3 Title</label>
                                            <input type="text" class="form-control" name="element_3_title"
                                                   value="{{$data->element_3_title}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Element 3 Description</label>
                                            <textarea class="form-control" name="element_3_description" rows="4" required
                                            >{{$data->element_3_description}}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-4">
                                                <label>Element 3 Image 2</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->element_3_image_2}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="element_3_image_2" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 3 Title 2</label>
                                            <input type="text" class="form-control" name="element_3_title_2"
                                                   value="{{$data->element_3_title_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Element 3 Title 3</label>
                                            <input type="text" class="form-control" name="element_3_title_3"
                                                   value="{{$data->element_3_title_3}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Element 3 Description 2</label>
                                            <input type="text" class="form-control" name="element_3_description_2_line_1"
                                                   value="{{$data->element_3_description_2_line_1}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="element_3_description_2_line_2"
                                                   value="{{$data->element_3_description_2_line_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="element_3_description_2_line_3"
                                                   value="{{$data->element_3_description_2_line_3}}" required
                                            >
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3>Section 3</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="section_3_title"
                                                   value="{{$data->section_3_title}}" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="name">Description</label>
                                            <input type="text" class="form-control" name="section_3_description_line_1"
                                                   value="{{$data->section_3_description_line_1}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_3_description_line_2"
                                                   value="{{$data->section_3_description_line_2}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="section_3_description_line_3"
                                                   value="{{$data->section_3_description_line_3}}" required
                                            >
                                        </div>
                                        <div class="form-group col-md-12 row">
                                            <div class="col-md-4">
                                                <label>Plan 1 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->section_3_plan_1_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_3_plan_1_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plan 2 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->section_3_plan_2_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_3_plan_2_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plan 3 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->section_3_plan_3_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_3_plan_3_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plan 4 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->section_3_plan_4_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_3_plan_4_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plan 5 Image</label>
                                                <div class="img-upload">
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{$data->section_3_plan_5_image}});">
                                                        <label for="image-upload" class="img-label"
                                                               id="image-label">{{ __('Upload Image') }}</label>
                                                        <input type="file" name="section_3_plan_5_image" class="img-upload"
                                                               id="image-upload">
                                                    </div>
                                                </div>
                                            </div>
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

