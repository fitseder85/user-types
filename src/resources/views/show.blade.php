@extends('templates.' . Session::get('template') . '.layouts.app')

@section('title', $userType->name)
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ __("Information") }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div id="user">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless table-sm align-middle mb-0">
                            <tr>
                                <th class="ps-0" scope="row">{{ __("name") }}</th>
                                <td class="text-muted border-bottom">{{ $userType?->name }}</td>
                            </tr>
                            <tr>
                                <th class="ps-0" scope="row">{{ __("description") }}</th>
                                <td class="text-muted border-bottom">{{ $userType?->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="text-right mt-3 mb-3">
                    <a class="btn btn-primary mb-2" href="{{ route("userTypes.edit", $userType->id) }}">{{ __("modify") }}</a>
                    <form action="{{ route("userTypes.status", $userType->id) }}" class="d-inline" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{ $userType->status ? 0 : 1 }} ">
                        @if ($userType->status)
                            <button type="submit" class="btn btn-warning mb-2">{{ __("disable") }}</button>
                        @else
                            <button type="submit" class="btn btn-outline-success mb-2">{{ __("enable") }}</button>
                        @endif
                    </form>
                    <a class="btn btn-danger mb-2" data-toggle="modal" data-target="#DeleteModal">{{ __("delete") }}</a>
                    <a class="btn btn-outline-danger mb-2" href="{{ route("userTypes") }}">{{ __("cancel") }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DeleteModal">
        <div class="modal-dialog">
            <form action="{{ route("userTypes.destroy", $userType->id) }}" method="post"  class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">{{ __("delete") }} {{ $userType->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="name" value="{{ $userType->id }}">
                    <h3>{{ __("are you sure you want to delete this?", ['name' => __("user")]) }}</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{ __("close") }}</button>
                    <button type="submit" class="btn btn-outline-danger">{{ __("delete") }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
