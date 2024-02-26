@extends('master.dashboard')
@section('main')
<form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Create News</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" required class="form-control" rows="6"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
            <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <!-- /.card-body -->
    </div>
</form>
@stop