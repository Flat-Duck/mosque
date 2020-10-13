@extends('admin.layouts.app', ['page' => 'teacher'])

@section('title', 'إداراة المعلمين')

@section('content')
<div class="x_title">
    <h2>إداراة المعلمين</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.teachers.create') }}"
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
            <th>الإسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم كتيب العائلة</th>
            <th>طبيعة التكليف</th>
            <th>الجامع</th>
            <th>الحالة</th>
            <th>العمليات</th>
        </tr>
</thead>
<tbody>
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->date_birth }}</td>
                <td>{{ $teacher->family_booklet_number }}</td>
                <td>{{ $teacher->getDesignation() }}</td>
                <td>{{ $teacher->mosque->name }}</td>
                @if ($teacher->active)
                <td><span class="badge bg-green"> غير موقوف</span></td>
                
                @else
                <td><span class="badge bg-red">موقوف</span></td>
                @endif
                <td>
                    <a href="{{ route('admin.teachers.edit', ['teacher' => $teacher->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.teachers.destroy', ['teacher' => $teacher->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                   @if ($teacher->active)
                                        <i data-toggle="tooltip" title="ايقاف" class='fa fa-lock'></i>
                                        @else
                                        <i data-toggle="tooltip" title="تفعيل" class='fa fa-lock-open'></i>
                                        @endif
                        </a>
                    </form>
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
    {{ $teachers->links('vendor.pagination.default') }}
</div>
@endsection
