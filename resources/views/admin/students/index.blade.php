@extends('admin.layouts.app', ['page' => 'student'])

@section('title', 'Students')

@section('content')
<div class="x_title">
    <h2>Students</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.students.create') }}"
    >
        إضافة جديد
    </a>

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>الرقم الوطني</th>
            <th>الإسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم الهاتف</th>
            <th>الجنسية</th>
            <th>العمليات</th>
        </tr>

        @forelse ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->national_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->date_birth }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->nationality->name }}</td>
                <td>
                    <a href="{{ route('admin.students.edit', ['student' => $student->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.students.destroy', ['student' => $student->id]) }}"
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
    {{ $students->links('vendor.pagination.default') }}
</div>
@endsection
