@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'user'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <img class="avatar" src="{{ asset($user->photo) }}" alt="">
                            <h5 class="title">{{ $user->name }}</h5>
                        </a>
                        <p class="description">
                            {{ $user->email }}
                        </p>
                    </div>
                    </p>
                </div>


            </div>
        </div>
    </div>
    <div class="row" style="margin-left:150px">
        <div class="col-md-6">
            <h4>
                <span>Phone : </span> {{ $user->phone_number }}
            </h4>
            <h4>
                <span>Address : </span> {{ $user->address }}
            </h4>

            <h4>
                <span>Hired Date : </span> {{ $user->join_date->format('D M Y') }}
            </h4>

            <h4>
                <span>D.O.B : </span> {{ $user->birth_date->format('D M Y') }}
            </h4>

            <h4>
                <span>Gender : </span> {{ $user->gender }}
            </h4>
        </div>
        <div class="col-md-6">
            <h4>
                <span>Sub Specialty: </span> {{ $user->sub_specialty->name }}
            </h4>
            <h4>
                <span>Shift : </span> from {{ $user->shifts->startTime }} to
                {{ $user->shifts->endTime }}
            </h4>

            <h4>
                <span>Status : </span> {{ $user->status }}
            </h4>

            <h4>
                <span>Role : {{ $user->roles_name }}



            </h4>

        </div>
    </div>

    <div class="col-md-12  text-center">
        <a href="{{ route('user.edit', $user) }}" class="btn btn-fill btn-warning">{{ _('Edit') }}</a>
    </div>

    {{-- //footer --}}
    <div class="row" style="margin-left:420px">
        <div class="card-footer">
            <div class="button-container">
                <button class="btn btn-icon btn-round btn-facebook">
                    <i class="fab fa-facebook"></i>
                </button>
                <button class="btn btn-icon btn-round btn-twitter">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="btn btn-icon btn-round btn-google">
                    <i class="fab fa-google-plus"></i>
                </button>
            </div>
        </div>
    </div>
    </div>
@endsection
