@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'user'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h4 class="card-title ml-3"><strong>All Users</strong> </h4>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('user.card') }}" class="grid-view btn btn-link "><i class="fa fa-th"></i></a>
                    <a href="{{ route('user.index') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        User</a>
                </div>
            </div>
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-4 mt-3">
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
                                    <a href="{{ route('user.show', $user) }}" class="btn btn-sm btn-primary">Details</a>
                                </div>
                                </p>
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>


            {{-- //footer --}}
            <div class="row" style="margin-left:450px">
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
    </div>
@endsection
