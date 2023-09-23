@extends('layouts.app', ['page' => __('Typography'), 'pageSlug' => 'roles'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-12 text-right">
                                <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn btn-danger animation-on-hover" type="submit"
                                        onclick="return confirm('Are you sure you want to delete this {{ $role->name }} ?')">Delete</button>
                                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-success">Edit</a>

                                </form>
                            </div>


                        </div>

                    </div>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title"><strong>Details of <u> {{ $role->name }} </u> Role</strong></h3>
                    <h5 class="card-category"></h5>

                </div>
                <div class="card-body px-4 pt-2">
                    <div class="typography-line">
                        <h4>
                            <span class="ml-0">Role Name: </span>
                            {{ $role->name }}
                        </h4>
                    </div>

                    <h4>
                        <span>Permissions</span>
                    </h4>
                    <ul>

                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $v)
                                <li>{{ $v->name }}</li>
                            @endforeach
                        @endif
                    </ul>




                </div>
            </div>
        </div>
    </div>
@endsection
