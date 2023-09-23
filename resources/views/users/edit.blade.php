@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'user'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add New User') }}</h5>
                </div>
                <form method="post" action="{{ route('user.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">


                        @include('alerts.success')
                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ _('Name') }}" value="{{ old('name', $user->name) }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email address') }}</label>
                                    <input type="email" name="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ _('Email address') }}" value="{{ old('email', $user->email) }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            {{-- Password --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{ __('New Password') }}</label>
                                    <input type="password" name="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('New Password') }}" required>
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                            </div> --}}

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label>{{ _('Phone Number') }}</label>
                                    <input type="text" name="phone"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        placeholder="{{ _('Phone Number') }}"
                                        value="{{ old('phone', $user->phone_number) }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                            </div>
                            {{-- Address --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label>{{ _('Address') }}</label>
                                    <input type="text" name="address"
                                        class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                        placeholder="{{ _('Address') }}" value="{{ old('address', $user->address) }}">
                                    @include('alerts.feedback', ['field' => 'address'])
                                </div>
                            </div>
                            {{-- specialty --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('specialty') ? ' has-danger' : '' }}">
                                    <label>{{ _('specialty') }}</label>
                                    <select class="form-control{{ $errors->has('specialty') ? ' is-invalid' : '' }}"
                                        aria-label="Default select example" name="specialty" id="specialty">
                                        <option selected>select Specialty</option>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'specialty'])
                                </div>
                            </div>

                            {{-- Sub Specialty --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('sub_specialty') ? ' has-danger' : '' }}">
                                    <label>{{ _('Sub Specialty') }}</label>
                                    <select class="form-control{{ $errors->has('sub_specialty') ? ' is-invalid' : '' }}"
                                        aria-label="Default select example" name="sub_specialty">
                                        <option selected disabled>{{ $user->sub_specialty->name }}</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sub_specialty'])
                                </div>
                            </div>

                            {{-- Join Time --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('join_date') ? ' has-danger' : '' }}">
                                    <label>{{ _('Hired Date') }}</label>
                                    <input type="date" name="join_date"
                                        class="form-control{{ $errors->has('join_date') ? ' is-invalid' : '' }}"
                                        placeholder="{{ _('Hired Date') }}"
                                        value="{{ $user->join_date->format('Y-m-d') }}">
                                    @include('alerts.feedback', ['field' => 'hired_date'])
                                </div>
                            </div>

                            {{-- D.O.B Time --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                                    <label>{{ _('D.O.B') }}</label>
                                    <input type="date" name="birth_date"
                                        class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
                                        placeholder="{{ _('D.O.B') }}"
                                        value="{{ $user->birth_date->format('Y-m-d') }}">
                                    @include('alerts.feedback', ['field' => 'birth_date'])
                                </div>
                            </div>

                            {{-- Shift --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                    <label>{{ _('Shift') }}</label>
                                    <select class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                        aria-label="Default select example" name="shift">
                                        <option selected disabled>from {{ $user->shifts->startTime }} to
                                            {{ $user->shifts->endTime }}
                                        </option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}">
                                                from {{ $shift->startTime }} to {{ $shift->endTime }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'shift'])
                                </div>
                            </div>

                            {{-- gender --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                    <label>{{ _('Gender') }}</label>
                                    <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                        aria-label="Default select example" name="gender">
                                        <option selected disabled>{{ old('gender', $user->gender) }}</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'gender'])
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label>{{ _('Status') }}</label>
                                    <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                        aria-label="Default select example" name="status">
                                        <option selected disabled>{{ old('status', $user->status) }}</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Disable">Disable</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'status'])
                                </div>
                            </div>

                            {{-- Role --}}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                    <label>{{ _('Status') }}</label>
                                    <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                                        aria-label="Default select example" name="role">
                                        <option selected disabled>{{ old('role', $user->roles_name) }}</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'status'])
                                </div>
                            </div>

                            {{-- Photo --}}
                            <div class="col-md-12 mb-3">
                                <label><b>Please Select Image</b></label>
                                <input type="file" name="image" class="form-control" value="{{ $user->photo }}">
                                @if ($user->photo)
                                    <img style="  width: 100px;height: 100px;border-radius: 50%;"
                                        src="{{ asset($user->photo) }}">
                                @endif
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12  text-center">
                                <a href="{{ route('user.index') }}" class="btn btn-info">Back</a>
                                <button type="submit" class="btn btn-fill btn-primary">{{ _('Update') }}</button>
                            </div>
                        </div>
                </form>
            </div>


        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#specialty").on('change', function() {
                    var specialtyId = $(this).val();
                    if (specialtyId) {
                        $.ajax({
                            url: "{{ URL::to('sub_specialties') }}/" + specialtyId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="sub_specialty"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="sub_specialty"]').append(
                                        '<option value="' +
                                        key + '">' + value + '</option>');
                                });
                            },
                        });

                    } else {
                        console.log('AJAX load did not work');
                    }
                });

            });
        </script>
    @endsection
