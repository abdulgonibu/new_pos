@extends('layouts.home')
@section('contain')
    <div class="container-fluid">

        <!-- Page Heading -->


        <div class="row clearfix page_header">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">User Group</h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info" href="{{ route('group.create') }}"> <i class="fa fa-plus"></i> New Group</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Group</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-center">Actions</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-center">Actions</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->title }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('group.destroy', $group->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-toggle="modal" href="#deletemodal{{ $group->id }}"><i
                                                    class="fa fa-trash"></i>
                                                Delete</button>
                                        </form>

                                    </td>
                                </tr>

                                <div class="modal fade" id="deletemodal{{ $group->id }}" data-backdrop="static"
                                    data-keyboard="false" tabindex="-1"
                                    aria-labelledby="deletemodalLabel {{ $group->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deletemodalLabel{{ $group->id }}">Are You
                                                    Sure Delete ?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-dialog modal-dialog-centered">
                                                User Grou {{ $group->title }} will be deleted permanently.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
