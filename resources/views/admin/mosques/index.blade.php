@extends('admin.layouts.app', ['page' => 'mosque'])

@section('title', 'المساجد')

@section('content')
<div class="x_title">
    <h2>المساجد</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.mosques.create') }}"
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
            <th>تاريخ الإنشاء</th>
            <th>الحالة</th>
            <th>العمليات</th>
        </tr>
</thead>
<tbody>
        @forelse ($mosques as $mosque)
            <tr>
                <td>{{ $mosque->id }}</td>
                <td>{{ $mosque->name }}</td>
                <td>{{ $mosque->date_construction }}</td>
               @if ($mosque->active)
               <td><span class="badge bg-green"> مفعل</span></td>
              
               @else
               <td><span class="badge bg-red">غير مفعل</span></td> 
               @endif 
                <td>
                    <a href="{{ route('admin.mosques.edit', ['mosque' => $mosque->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.mosques.destroy', ['mosque' => $mosque->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                          @if ($mosque->active)
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
                <td colspan="4">لاتوجد سجلات</td>
            </tr>
        @endforelse
    </tbody>
    </table>
</div>

<div class="box-footer clearfix">
    {{ $mosques->links('vendor.pagination.default') }}
</div>
@endsection
