@extends('layouts.admin')

@section('content')


    <div class="container edit_form">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edit</h1>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ $project->title }}">
                <small id="title" class="form-text text-muted">Required field</small>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name=" type_id" id="type_id">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type?->id) ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="
                    {{ $project->description }}">
            </div>
            <div class="mb-3">
                <label for="repo_link" class="form-label">Repo link</label>
                <input type="text" class="form-control" name="repo_link" id="repo_link"
                    value="
                    {{ $project->repo_link }}">
            </div>
            <div class="mb-3">
                <label for="view_link" class="form-label">View link</label>
                <input type="text" class="form-control" name="view_link" id="view_link"
                    value="
                    {{ $project->view_link }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select form-select-lg" name="status" id="status" {{ $project->status }}>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="number" step="1" class="form-control" name="duration" id="duration"
                    {{ $project->duration }}>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date"{{ $project->start_date }}>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date"{{ $project->end_date }}>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    </div>
@endsection
