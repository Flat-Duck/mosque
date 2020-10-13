@extends('user.layouts.app', ['page' => 'course'])

@section('title', 'الدورات')

@section('content')
<div class="x_title">
    <h2>الدورات</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.courses.create') }}"
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
            <th>توقيت البداية</th>
            <th>توقيت النهاية</th>
            <th>المعلم</th>
            <th>المستوى</th>
            <th>السنة</th>
            <th>الحالة</th>
            <th>العمليات</th>
        </tr>

        @forelse ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->start_time }}</td>
                <td>{{ $course->end_time }}</td>
                <td>{{ $course->teacher->name }}</td>
                <td>{{ $course->level->name }}</td>
                <td>{{ $course->year }}</td>
                @if ($course->active)
                <td><span class="badge bg-green"> غير موقوفة</span></td>

                @else
                <td><span class="badge bg-red">موقوفة</span></td>
                @endif

                <td>
                    <a href="{{ route('user.courses.edit', ['course' => $course->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                
                    <form action="{{ route('user.courses.destroy', ['course' => $course->id]) }}" method="POST" class="inline pointer">
                        @csrf
                        @method('DELETE')
                
                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            @if ($course->active)
                            <i style="color: red;"  data-toggle="tooltip" title="ايقاف" class='fa fa-lock'></i>
                            @else
                            <i style="color: green;"  data-toggle="tooltip" title="تفعيل" class='fa fa-lock-open'></i>
                            @endif
                        </a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">لاتوجد سجلات</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $courses->links('vendor.pagination.default') }}
</div>
@endsection
