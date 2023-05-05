@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Task List') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update.task',$task->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="todo_id" value="{{ $task->todo_id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $task->name }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
