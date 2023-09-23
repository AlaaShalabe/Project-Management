@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List'), 'pageSlug' => 'roles'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="card-title "><strong>All Roles</strong> </h4>

                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Add
                                        Role</a>
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

                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Created at
                                            </th>
                                            <th class="text-right">Actions</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                @php
                                                    $Count++;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        {{ $Count }}
                                                    </td>
                                                    <td>
                                                        {{ $role->name }}</a>
                                                    </td>

                                                    <td>
                                                        {{ $role->created_at->format('D M Y') }}
                                                    </td>

                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <td class="td-actions text-right">
                                                            <a href="{{ route('roles.show', $role) }}" rel="tooltip"
                                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-tv-2"></i>
                                                            </a>
                                                            <a href="{{ route('roles.edit', $role) }}" rel="tooltip"
                                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-pencil"></i>
                                                            </a>
                                                            <button type="submit" rel="tooltip"
                                                                class="btn btn-danger btn-sm btn-round btn-icon"
                                                                onclick="return confirm('Are you sure you want to delete this {{ $role->name }}?')">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </form>
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
