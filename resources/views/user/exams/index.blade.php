@extends('user.layouts.app', ['page' => 'exam'])

@section('title', 'الامتحانات')

@section('content')
<div class="x_title">
    <h2>الامتحانات</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.exams.create') }}"
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
            <th>التاريخ</th>
            <th>الحفظ</th>
            <th>الأحكام التطبيقية</th>
            <th>الرسم القرأني</th>
            <th>اسم الطالب</th>
            <th>العمليات</th>
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
                    <a href="{{ route('user.exams.edit', ['exam' => $exam->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    {{-- <form action="{{ route('user.exams.destroy', ['exam' => $exam->id]) }}"
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
    </table>
</div>

<div class="box-footer clearfix">
    {{ $exams->links('vendor.pagination.default') }}
</div>
@endsection
