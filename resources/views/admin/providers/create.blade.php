@extends('admin.layouts.master')

@section('page')
    Add Provider
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Personal Information</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ url('admin/providers')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.providers.fields')
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Job Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ url('admin/providers')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.providers.fields')
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
