@extends('layouts.app', ['page' => __('Role Management'), 'pageSlug' => 'roles'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create Roles') }}</h5>
                </div>
                <form method="post" action="{{ route('roles.update', $role) }}">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        @include('alerts.success')

                        {{-- Name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('name', $role->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Permissions List</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group{{ $errors->has('permission[]') ? ' has-danger' : '' }}">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                            {{ $value->name }}</label>
                                        <br />
                                        @include('alerts.feedback', ['field' => 'permission[]'])
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
