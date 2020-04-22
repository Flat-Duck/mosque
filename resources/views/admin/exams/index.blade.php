@extends('admin.layouts.app', ['page' => 'exam'])

@section('title', 'Exams')

@section('content')
<div class="x_title">
    <h2>Exams</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.exams.create') }}"
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
            <th>Date</th>
            <th>Save</th>
            <th>Applied Rules</th>
            <th>Drawing</th>
            <th>Student</th>
            <th>Action</th>
        </tr>

        @forelse ($exams as $exam)
            <tr>
                <td>{{ $exam->id }}</td>
                <td>{{ $exam->date }}</td>
                <td>{{ $exam->save }}</td>
                <td>{{ $exam->applied_rules }}</td>
                <td>{{ $exam->drawing }}</td>
                <td>{{ $exam->student->name }}</td>
                <td>
                    <a href="{{ route('admin.exams.edit', ['exam' => $exam->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.exams.destroy', ['exam' => $exam->id]) }}"
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
                <td colspan="7">No records found</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $exams->links('vendor.pagination.default') }}
</div>
@endsection
