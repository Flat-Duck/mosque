@extends('user.layouts.app', ['page' => 'teacher'])

@section('title', 'Teachers')

@section('content')
<div class="x_title">
    <h2>قائمة المعلمين</h2>
{{-- 
    <a class="pull-right btn btn-primary"
        href="{{ route('user.teachers.create') }}"
    >
        إضافة جديد
    </a> --}}

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>الإسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم كتيب العائلة</th>
            <th>طبيعة التكليف</th>
           
            {{-- <th>العمليات</th> --}}
        </tr>

        @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->date_birth }}</td>
                <td>{{ $teacher->family_booklet_number }}</td>
                <td>{{ $teacher->getDesignation() }}</td>
                {{-- <td>{{ $teacher->mosque->name }}</td> --}}
                {{-- <td>
                    <a href="{{ route('user.teachers.edit', ['teacher' => $teacher->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('user.teachers.destroy', ['teacher' => $teacher->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            <i class="fa fa-trash"></i>
                        </a>
                    </form>
                </td> --}}
            </tr>
        @empty
            <tr>
                <td colspan="7">لاتوجد سجلات</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $teachers->links('vendor.pagination.default') }}
</div>
@endsection
