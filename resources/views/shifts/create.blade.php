@extends('layouts.app', ['page' => __('Shift Management'), 'pageSlug' => 'shifts'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add  Shift') }}</h5>
                </div>
                <form method="post" action="{{ route('shifts.store') }}">

                    <div class="card-body d-flex justify-content-center">
                        @csrf

                        @include('alerts.success')
                        <div class="row">

                            {{-- Start Time --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label"> Start Time <span class="text-danger">*</span></label>
                                    <input name="start_time"
                                        class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}"
                                        type="time">
                                    @include('alerts.feedback', ['field' => 'start_time'])
                                </div>
                            </div>

                            {{-- End Time --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label"> End Time <span class="text-danger">*</span></label>
                                    <input name="end_time"
                                        class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}"
                                        type="time">
                                    @include('alerts.feedback', ['field' => 'end_time'])
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <a href="{{ route('shifts.index') }}" class="btn btn-info">Back</a>
                                <button type="submit" class="btn btn-primary">{{ _('Save') }}</button>
                            </div>

                        </div>
                    </div>

                </form>


            </div>






        </div>


    </div>
@endsection
