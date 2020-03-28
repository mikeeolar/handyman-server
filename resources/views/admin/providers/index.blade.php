@extends('admin.layouts.master')

@section('page')
    Providers
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('admin/providers/create') }}" class="btn btn-primary"><i
                                class="fas fa-user-plus"></i> Add New Provider</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Registered At</th>
                                <th>Is Verified</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->first_name }} {{ $provider->last_name }}</td>
                                    <td>{{ $provider->email }}</td>
                                    <td>{{ $provider->gender }}</td>
                                <td>{{ $provider->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if($provider->verified)
                                            <a href="{{ route('provider.notVerified', $provider->id) }}"
                                               class="btn btn-sm  {{ $provider->verified ? 'btn-primary' : 'btn-danger' }}"><i
                                                    class="{{ $provider->verified ? 'fas fa-check' : 'fas fa-times' }} "></i>
                                                {{ $provider->verified ? ' Yes' : ' No' }}
                                            </a>
                                        @else
                                            <a href="{{ route('provider.verified', $provider->id) }}"
                                               class="btn btn-sm  {{ $provider->verified ? 'btn-primary' : 'btn-danger' }}"><i
                                                    class="{{ $provider->verified ? 'fas fa-check' : 'fas fa-times' }} "></i>
                                                {{ $provider->verified ? ' Yes' : ' No' }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('providers.show', $provider->id) }}">
                                                <i class="fas fa-folder"></i> View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Registered At</th>
                                <th>Is Verified</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
