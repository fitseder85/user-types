@extends('templates.' . Session::get('template') . '.layouts.app')

@section('title', __("manage",  ['name' => __("categories")]))
@section('content')
    <div class="mb-3 text-right">
        <a class="btn btn-primary btn-flat btn-elevation" href="{{ route("userTypes.create") }}"><i class="fa fa-plus"></i> {{ __("new",  ['name' => __("user type")]) }}</a>
    </div>
    <div class="card rounded-0 card-primary card-outline">
        @if ($userTypes->isNotEmpty())
            <div class="card-body table-responsive bg-transparent p-0">
                <table class="table table-hover">
                    <thead>
                        <tr role="row">
                            <th>{{ __("name") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userTypes as $userType)
                            <tr onclick="location.href='{{ route('userTypes.show', $userType->id) }}'">
                                <td><a class="text-dark" href="{{ route('userTypes.show', $userType->id) }}">{{ $userType->name }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $userTypes->links('templates.standard.pagination._pagination') }}
            </div>
        @else
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                    <h3 class="display-4">{{ __("no data to display") }}</h3>
                </div>
            </div>
        @endif
    </div>
@endsection
