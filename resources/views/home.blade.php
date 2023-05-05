@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('To Do List') }}</div>
                <div class="text-end">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     + Add New
                    </button>

                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                        <table id="myTable" class="display">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>To Do Name</th>
                                <th>Tasks</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($todos as $todo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $todo->name }}</td>
                                <td>Row 1 Data 1</td>
                                <td>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <form action="{{ route('store.todo') }}" method="post" enctype="multipart/form-data">
                   @csrf
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Add new To Do</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="form-group">
                           <label for="name">Name:</label>
                           <input type="text" name="name" class="form-control" id="name" required>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">ADD</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection
