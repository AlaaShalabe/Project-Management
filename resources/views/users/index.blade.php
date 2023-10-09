@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List'), 'pageSlug' => 'users'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="card-title "><strong>All Users</strong> </h4>

                                </div>
                                <div class="col-auto float-right ml-auto">
                                    <a href="{{ route('user.card') }}" class="grid-view btn btn-link "><i
                                            class="fa fa-th"></i></a>
                                    <a href="{{ route('user.index') }}" class="list-view btn btn-link"><i
                                            class="fa fa-bars"></i></a>
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-plus"></i> Add User</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $Count = 0;
                        @endphp
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">

                                            <th> # </th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Sub Specialty</th>
                                            <th scope="col">Hired Date</th>
                                            <th scope="col">D.O.B</th>
                                            <th scope="col">Shift</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Show/Edit/Delete</th>


                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                @php
                                                    $Count++;
                                                @endphp
                                                <tr>

                                                    <td> {{ $Count }}</td>
                                                    <td>
                                                        @if ($user->photo)
                                                            <img class="avatar" style="width:50px;height:50px"
                                                                src="{{ asset($user->photo) }}" alt="">
                                                        @else
                                                            <img class="avatar"
                                                                src="{{ asset('white') }}/img/default-avatar.png">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p class="text-lg text-dark mb-0">{{ $user->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-lg text-dark mb-0">{{ $user->email }}</p>
                                                    </td>

                                                    <td>
                                                        <p class="text-lg text-dark mb-0">{{ $user->phone_number }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-lg text-dark mb-0">{{ $user->address }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-lg text-dark mb-0">
                                                            {{ $user->sub_specialty->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-dark mb-0">
                                                            {{ $user->join_date->format('D M Y') }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-lg text-dark mb-0">
                                                            {{ $user->birth_date->format('D M Y') }}
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <p class="text-lg text-dark mb-0">
                                                            {{ $user->shifts->startTime }}-{{ $user->shifts->endTime }}
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <p class="text-lg text-dark mb-0">{{ $user->gender }}</p>
                                                    </td>
                                                    <td>
                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $v }}</h6>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </td>


                                                    <td>
                                                        <div class="btn-group">
                                                            @if ($user->status == 'Active')
                                                                <button type="button"
                                                                    class="btn btn-success dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    {{ $user->status }}
                                                                </button>
                                                            @elseif ($user->status == 'Inactive')
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    {{ $user->status }}
                                                                </button>
                                                            @elseif ($user->status == 'Disable')
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                    {{ $user->status }}
                                                                </button>
                                                            @elseif ($user->status == '')
                                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                                    href="#" data-toggle="dropdown"
                                                                    aria-expanded="false">

                                                                    <span class="statuss">N/A</span>
                                                                </a>
                                                            @endif

                                                            <div class="dropdown-menu">
                                                                @if ($user->status == 'Active')
                                                                    <a class="alert alert-info dropdown-item text-dark"
                                                                        href="{{ route('user.inactive', $user->id) }}">
                                                                        Inactive
                                                                    </a>
                                                                    <a class="alert alert-warning dropdown-item text-dark"
                                                                        href="{{ route('user.disable', $user->id) }}">
                                                                        Disable
                                                                    </a>
                                                                @elseif ($user->status == 'Inactive')
                                                                    <a class="alert alert-info dropdown-item text-dark"
                                                                        href="{{ route('user.active', $user->id) }}">
                                                                        Active
                                                                    </a>
                                                                    <a class="alert alert-warning dropdown-item text-dark"
                                                                        href="{{ route('user.disable', $user->id) }}">
                                                                        Disable
                                                                    </a>
                                                                @else
                                                                    <a class="alert alert-info dropdown-item text-dark"
                                                                        href="{{ route('user.active', $user->id) }}">
                                                                        Active
                                                                    </a>
                                                                    <a class="alert alert-warning dropdown-item text-dark"
                                                                        href="{{ route('user.inactive', $user->id) }}">
                                                                        Inactive
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>


                                                    <td class="td-actions text-right" style='width:100%'>
                                                        <form action="{{ route('user.destroy', $user) }}" method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <a href="{{ route('user.show', $user) }}" rel="tooltip"
                                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-tv-2"></i>
                                                            </a>
                                                            <a href="{{ route('user.edit', $user) }}" rel="tooltip"
                                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-pencil"></i>
                                                            </a>
                                                            <button type="submit" rel="tooltip"
                                                                class="btn btn-danger btn-sm btn-round btn-icon"
                                                                onclick="return confirm('Are you sure you want to delete this {{ $user->name }}?')">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
