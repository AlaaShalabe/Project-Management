@extends('layouts.app', ['page' => __('Typography'), 'pageSlug' => 'specialties'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-12 text-right">
                                <form action="{{ route('specialties.destroy', $specialty) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn btn-danger animation-on-hover" type="submit"
                                        onclick="return confirm('Are you sure you want to delete this {{ $specialty->name }} ?')">Delete</button>
                                    <a href="{{ route('specialties.edit', $specialty) }}"
                                        class="btn btn-sm btn-success">Edit</a>

                                </form>
                            </div>


                        </div>

                    </div>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title"><strong><u>{{ $specialty->name }} </u> Specialties</strong></h3>
                    <h5 class="card-category"></h5>

                </div>
                <div class="card-body">
                    <div class="typography-line">

                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>name</span>{{ $specialty->name }}
                        </h4>
                    </div>

                    <div class="typography-line">
                        <h4>
                            <span>Created at</span>{{ $specialty->created_at->format('d M Y') }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Updated at</span>{{ $specialty->updated_at->format('d M Y') }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
