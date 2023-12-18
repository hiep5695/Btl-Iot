@extends("admin.layout")
@section("do-du-lieu-tu-view")
    <div class="col-md-12">
    @if($user->role==1)
    <div style="margin-bottom:5px;">
        <a href="{{ url('backend/users/create') }}" class="btn btn-primary">Create</a>
    </div>
    @endif
    <div class="panel panel-primary">
        <div class="panel-heading">List</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    @if($user->role==1)
                    <th style="width:100px;"></th>
                     @endif
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                        @if($row->role == 1)
                        ADMIN
                        @elseif($row->role == 2)
                        MOD
                        @else
                        USER
                        @endif
                    </td>
                    @if($user->role==1)
                    <td style="text-align:center;">
                        <a href="{{ url('backend/users/update/'.$row->id) }}">Edit</a>&nbsp;
                        <a href="{{ url('backend/users/delete/'.$row->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                     @endif
                </tr>
                @endforeach
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            {{ $data->render() }}
        </div>
    </div>
</div>
@endsection