@extends('admin.layouts.master')

@section('page')
    Add New Service
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Service</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ url('admin/services')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.services.fields')
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
