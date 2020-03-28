@extends('admin.layouts.master')

@section('page')
    Dashboard
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Site Statistics -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-green"><i class="fas fa-chart-bar"></i> Site Statistics</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ url('admin/users') }}">
                                        <div class="info-box bg-gradient-yellow">
                                            <span class="info-box-icon"><i class="fas fa-user-friends"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Users</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('admin/providers') }}">
                                        <div class="info-box bg-gradient-orange">
                                            <span class="info-box-icon"><i class="fas fa-user-tie"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Providers</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#">
                                        <div class="info-box bg-blue">
                                            <span class="info-box-icon"><i class="fas fa-boxes"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Categories</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        <div class="info-box bg-gradient-navy">
                                            <span class="info-box-icon"><i class="fas fa-wrench"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Services</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Statistics -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-green"><i class="fas fa-chart-area"></i> Job Statistics</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#">
                                        <div class="info-box bg-gradient-yellow">
                                            <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Total Jobs</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        <div class="info-box bg-gradient-orange">
                                            <span class="info-box-icon"><i class="fas fa-clone"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Ongoing Jobs</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#">
                                        <div class="info-box bg-gradient-red">
                                            <span class="info-box-icon"><i class="fas fa-times-circle"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Cancelled Jobs</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        <div class="info-box bg-gradient-green">
                                            <span class="info-box-icon"><i class="fas fa-check"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Completed Jobs</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
