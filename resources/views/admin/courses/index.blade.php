@extends('admin.layouts.app', ['page' => 'course'])

@section('title', 'Courses')

@section('content')
<div class="x_title">
    <h2>Courses</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.courses.create') }}"
    >
        Add New
    </a>

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Level</th>
            <th>Action</th>
        </tr>

        @forelse ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->start_time }}</td>
                <td>{{ $course->end_time }}</td>
                <td>{{ $course->level->name }}</td>
                <td>
                    <a href="{{ route('admin.courses.edit', ['course' => $course->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.courses.destroy', ['course' => $course->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No records found</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $courses->links('vendor.pagination.default') }}
</div>
@endsection
