@extends('layouts.app')

@section('content')
    <h4>Edit roles</h4>
    <div class="card">
        <form method="post" action="/edit/role/{{$user->id}}" class="form-horizontal">
            @csrf
            <div class="card col-lg-12 col-sm-12">
                <div class="card-body">
                    <h4 class="card-title">Role for <strong>{{$user->name}}</strong></h4>
                    <div class="form-group row">
                        @foreach($roles as $role)
                            <div class="col-md-2">
                                <div class="form-check mr-sm-2">
                                    @if($user->hasRole($role->name))
                                        <input type="checkbox"
                                               class="form-check-input mce-checkbox"
                                               checked
                                               name="role_checkbox[{{$role->name}}]">
                                        <label class="form-check-label mb-0"
                                               for="role_checkbox">
                                            <div class="chip">
                                                <div>{{$role->name}}</div>
                                            </div>
                                        </label>
                                    @else
                                        <input type="checkbox"
                                               class="form-check-input"
                                               name="role_checkbox[{{$role->name}}]">
                                        <label class="form-check-label mb-0"
                                               for="role_checkbox">
                                            <div class="chip">
                                                <div>{{$role->name}}</div>
                                            </div>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group row mb-5">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
