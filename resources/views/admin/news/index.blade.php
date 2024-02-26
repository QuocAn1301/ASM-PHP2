@extends('master.dashboard')
@section('title', 'News')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">News</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="{{ route('news.create') }}">
            <i class="fas fa-folder"></i> Create
        </a>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 15%">Title</th>
                    <th style="width: 10%">Image</th>
                    <th style="width: 15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                            style="width: 50px; height: 50px; object-fit: cover; margin-right: 5px;">
                        @else
                        No Image
                        @endif
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="{{ route('news.edit', $item->id) }}">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <form id="deleteForm_{{ $item->id }}" action="{{ route('news.destroy', $item->id) }}"
                            method="post" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete({{ $item->id }}, '{{ $item->title }}')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<script>
function confirmDelete(newsId, newsTitle) {
    if (confirm('Are you sure you want to delete the news "' + newsTitle + '"?')) {
        // Assuming you have a function to submit the form
        document.getElementById('deleteForm_' + newsId).submit();
    }
}
</script>

@stop