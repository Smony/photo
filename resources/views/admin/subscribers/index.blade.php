@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    @include('admin.partials.messages')
                    @include('admin.partials.errors')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                Subscribers
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#sendMassMessages">Send messages</button>
                            </h5>
                        </div>

                        @if(count($subscribers))
                            <hr>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subscribers as $subscriber)
                                            <tr>
                                                <td>{{ mb_substr($subscriber->getAttribute('email'), 0, 35) }}</td>
                                                <td>
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-success send-single" data-toggle="modal" data-target="#sendSingleMessage" data-subscriber-id="{{ $subscriber->getKey() }}">Send message</button>
                                                        <a href="{{ route('admin.subscribers.destroy', ['subscriber' => $subscriber]) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        {!! $subscribers !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sendMassMessages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="{{ route('admin.subscribers.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Send messages to all subscribers</h4>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Send messages</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="sendSingleMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="{{ route('admin.subscribers.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="subscriber" id="subscriber" value="{{ old('subscriber') }}">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Send message to single subscriber</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Send message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".send-single").click(function () {

                $("#subscriber").val($(this).attr("data-subscriber-id"));
            });
        })
    </script>
@endsection