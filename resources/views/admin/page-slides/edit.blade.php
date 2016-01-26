@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.pageSlides.index') }}"><i class="icon-images2 position-left"></i> Page slides</a></li>
                <li class="active">Edit</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="{{ route('admin.pageSlides.create') }}"><i class="icon-file-plus position-left"></i> Create new slide</a></li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Edit page slide</h5>
                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                    <hr>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.pageSlides.update', ['pageItem' => $pageSlide]) }}" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Title:</label>
                            <div class="col-lg-9">
                                <input type="text" name="title" value="{{ old('title', $pageSlide->getAttribute('title')) }}" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ordinal position:</label>
                            <div class="col-lg-9">
                                <input type="text" name="ordinal_position" value="{{ old('ordinal_position', $pageSlide->getAttribute('ordinal_position')) }}" class="form-control" placeholder="Ordinal position">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description:</label>
                            <div class="col-lg-9">
                                <input type="text" name="description" value="{{ old('description', $pageSlide->getAttribute('description')) }}" class="form-control" placeholder="Description">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Slide photo:</label>
                            <div class="col-lg-9">
                                <input type="file" name="slide_photo" class="file-input-custom" accept="image/*">
                            </div>
                        </div>

                        <div class="col-lg-9 col-lg-offset-3">
                            @include('admin.partials.errors')
                        </div>

                        <div class="text-right">
                            <a class="btn btn-danger" href="{{ route('admin.pageSlides.destroy', ['pageItem' => $pageSlide]) }}"><i class="icon-cross2"></i> Remove</a>
                            <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="thumbnail">
                <div class="thumb">
                    <img src="{{ asset($pageSlide->getPageSlidePhotoUrl()) }}" alt="">
                    <div class="caption-overflow">
					    <span>
					    	<a href="{{ asset($pageSlide->getPageSlidePhotoUrl()) }}" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-eye"></i></a>
					    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{--Image--}}
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/gallery.js') }}"></script>
    {{--End Image--}}

    {{--Simple uplload--}}
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/uploaders/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/uploader_bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".kv-fileinput-upload").remove();
        });
    </script>
    {{--End Simple upload--}}
@endsection