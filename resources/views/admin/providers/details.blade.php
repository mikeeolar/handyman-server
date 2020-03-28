@extends('admin.layouts.master')

@section('page')
    Provider - Profile
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-primary">
                    <img class="img-fluid img-rounded img-bordered-sm"
                         src="{{ url($userProfile[0]->users->image) }}"
                         alt="User profile picture">
                    <div class="card-body">
                        <h3 class="text-dark">{{ $userProfile[0]->users->first_name }} {{ $userProfile[0]->users->last_name }}
                            | <span
                                class="text-bold">{{ $userProfile[0]->users->userServices[0]->categories->name }}</span>
                        </h3>
                        <p class="text-muted text-center"></p>
                        <p>
                            <i class="fa fa-map-marker-alt fa-fw pr-4"></i> {{ $userProfile[0]->users->location }}
                        </p>
                        <p><i class="fa fa-home fa-fw pr-4"></i> {{ $userProfile[0]->users->address }}</p>
                        <p><i class="fa fa-envelope fa-fw pr-4"></i> {{ $userProfile[0]->users->email }}</p>
                        <p><i class="fa fa-phone fa-fw pr-4"></i> {{ $userProfile[0]->users->phone_number }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-sm-8">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-file-alt mr-1"></i> Professional Summary</strong>

                        <p class="text-muted">
                            {{ $userProfile[0]->professional_summary }}
                        </p>

                        <hr>

                        <strong><i class="fas fa-book mr-1"></i> Certificate</strong>
                        <p class="text-muted">
                            {{ $userProfile[0]->certificate }}
                        </p>

                        <hr>

                        <strong><i class="fas fa-star mr-1"></i> Experience</strong>
                        <p class="text-muted">
                            {{ $userProfile[0]->experience }} Year(s)
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Job Location</strong>

                        <p class="text-muted">{{ $userProfile[0]->job_location }}</p>

                        <hr>

                        <strong><i class="fas fa-home mr-1"></i> Job Location</strong>

                        <p class="text-muted">{{ $userProfile[0]->job_address }}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Services Rendered</strong>

                        @foreach($userProfile[0]->users->userServices as $service)
                            <div class="text-muted">{{ $service->services->name }}</div>
                        @endforeach

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
