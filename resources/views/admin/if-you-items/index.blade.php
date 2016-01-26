@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.ifYouItems.index') }}"><i class="icon-fence position-left"></i> If you items</a></li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="{{ route('admin.ifYouItems.create') }}"><i class="icon-file-plus position-left"></i> Create new item</a></li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    @include('admin.partials.messages')
                </div>
            </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">How it works items
                                    <a href="{{ route('admin.ifYouItems.create') }}" class="btn btn-success pull-right" style="color: white;">Create new item</a>
                                </h5>
                            </div>
                            <div class="pane-body">
                                @if(count($ifYouItems))
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Ordinal position</th>
                                                <th>Meta</th>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ifYouItems as $ifYouItem)
                                                <tr>
                                                    <td>{{ $ifYouItem->getAttribute('title') != null ? mb_substr($ifYouItem->getAttribute('title'), 0, 20) : '-' }}</td>
                                                    <td>{{ $ifYouItem->getAttribute('ordinal_position') != null ? $ifYouItem->getAttribute('ordinal_position') : '-' }}</td>
                                                    <td>{{ $ifYouItem->getAttribute('value') != null ? mb_substr($ifYouItem->getAttribute('value'), 0, 20) : '-' }}</td>
                                                    <td>{{ $ifYouItem->getAttribute('description') != null ? mb_substr($ifYouItem->getAttribute('description'), 0 ,20) : '-' }}</td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <a class="btn btn-default" href="{{ route('admin.ifYouItems.edit', ['pageItem' => $ifYouItem]) }}"><i class="icon-pencil6"></i> Edit</a>
                                                            <a class="btn btn-default" href="{{ route('admin.ifYouItems.destroy', ['pageItem' => $ifYouItem]) }}"><i class="icon-cross2"></i> Remove</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        {!! $ifYouItems !!}
                    </div>
                </div>

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