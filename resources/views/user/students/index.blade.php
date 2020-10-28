@extends('user.layouts.app', ['page' => 'student'])

@section('title', 'الطلبة')

@section('content')
<div class="x_title">
    <h2>الطلبة</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.students.create') }}"
    >
        إضافة جديد
    </a>

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
   <table id="table" class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>رقم القيد</th>
            <th>الإسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم الهاتف</th>
            <th>الجنسية</th>
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->enrolment_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->date_birth }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->nationality->name }}</td>
                <td>
                    <a href="{{ route('user.students.edit', ['student' => $student->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    {{-- <form action="{{ route('user.students.destroy', ['student' => $student->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            <i class="fa fa-trash"></i>
                        </a>
                    </form> --}}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">لاتوجد سجلات</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="box-footer clearfix">
    {{ $students->links('vendor.pagination.default') }}
</div>
@endsection
