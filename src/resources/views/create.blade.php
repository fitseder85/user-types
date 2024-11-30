@extends('templates.' . Session::get('template') . '.layouts.app')

@section('title', __("user types"))
@section('content')
    <div class="col-12">
        <div class="card rounded-0 elevation-3">
            <div class="card-header">
                <div class="card-title">{{ __("new",  ['name' => __("user type")]) }}</div>
            </div>
            <div class="card-body">
                <form class="mt-2 mb-0" action="{{ route('userTypes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('userTypes::_form', ['new' => true])
                    <div class="text-end mt-4">
                        <input class="btn btn-primary submit" type="submit" id="new" name="new" value="{{ __("save") }}">
                        <a href="{{ route('userTypes') }}" class="btn btn-danger" data-dismiss="modal">{{ __("close") }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
