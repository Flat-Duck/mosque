@extends('admin.layouts.app', ['page' => 'user'])

@section('title', 'إدارة المشرفين')

@section('content')
<div class="x_title">
    <h2>المستخدمين</h2>

    {{-- <a class="pull-right btn btn-primary"
        href="{{ route('admin.users.create') }}"
    >
        إضافة جديد
    </a> --}}

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
            <th>#</th>
            <th>الإسم</th>
            <th>البريد الالكتروني</th>
            <th>الجامع</th>
            {{-- <th>رقم كتيب العائلة</th> --}}
            {{-- <th>طبيعة التكليف</th> --}}
            <th>الحالة</th> 
            <th>العمليات</th>
        </tr>
</thead>
<tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->teacher->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->teacher->mosque->name }}</td>
                {{-- <td>{{ $user->getDesignation() }}</td> --}}
                {{-- <td>{{ $user->mosque->name }}</td> --}}
                @if ($user->active)
                <td><span class="badge bg-green"> غير موقوف</span></td>
                
                @else
                <td><span class="badge bg-red">موقوف</span></td>
                @endif 
                <td>
                   

                    <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                         @if ($user->active)  
                            <i data-toggle="tooltip"  title="ايقاف" class='fa fa-lock'></i>
                         @else
                             <i data-toggle="tooltip"  title="تفعيل" class='fa fa-lock-open'></i>
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
    {{ $users->links('vendor.pagination.default') }}
</div>
@endsection
@section('scripts')
    
<script>
    $(document).ready(function() {
    $('#table').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    'print'
    ]
    } );
    } );
</script>
@endsection