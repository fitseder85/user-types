@extends('templates.' . Session::get('template') . '.layouts.app')

@section('title', __("edit". $userType->name))
@section('content')
    <div class="col-12">
        <div class="card rounded-0 elevation-3">
            <div class="card-header">
                <div class="card-title">{{ __("edit", ['name'=> $userType->name]) }}</div>
            </div>
            <div class="card-body">
                <form class="mt-2 mb-0" action="{{ route('userTypes.update', $userType->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('userTypes::_form')
                    <div class="text-end mt-4">
                        <input class="btn btn-primary submit" type="submit" id="save" name="save" value="{{ __("save") }}">
                        <a href="{{ route('userTypes') }}" class="btn btn-danger" data-dismiss="modal">{{ __("close") }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
