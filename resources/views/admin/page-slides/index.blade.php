@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title"></div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.pageSlides.index') }}"><i class="icon-images2 position-left"></i> Page slides</a></li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="{{ route('admin.pageSlides.create') }}"><i class="icon-file-plus position-left"></i> Create new slide</a></li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">

            @include('admin.partials.messages')

        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Page slide items
                        <a href="{{ route('admin.pageSlides.create') }}" class="btn btn-success pull-right" style="color: white">Create new slide</a>
                    </h5>
                </div>

                @if(count($pageSlides))
                    <hr>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Ordinal position</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pageSlides as $pageSlide)
                                    <tr>
                                        <td>{{ $pageSlide->getAttribute('title') != null ? mb_substr($pageSlide->getAttribute('title'), 0 ,25) : '-' }}</td>
                                        <td>{{ $pageSlide->getAttribute('description') != null ? mb_substr($pageSlide->getAttribute('description'), 0 ,25) : '-' }}</td>
                                        <td>{{ $pageSlide->getAttribute('ordinal_position') != null ? $pageSlide->getAttribute('ordinal_position') : '-' }}</td>
                                        <td>
                                            <div class="pull-right">
                                                <a class="btn btn-default" href="{{ asset($pageSlide->getPageSlidePhotoUrl()) }}" data-popup="lightbox"> Show Photo</a>
                                                <a class="btn btn-default" href="{{ route('admin.pageSlides.edit', ['pageItem' => $pageSlide]) }}"><i class="icon-pencil6"></i> Edit</a>
                                                <a class="btn btn-default" href="{{ route('admin.pageSlides.destroy', ['pageItem' => $pageSlide]) }}"><i class="icon-cross2"></i> Remove</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            {!! $pageSlides !!}
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/gallery_library.js') }}"></script>
@endsection