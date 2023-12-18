@extends("admin.layout")
@section("do-du-lieu-tu-view")
<div class="col-md-4">
    <div style="margin-bottom:5px;">
        <a href="{{ url('backend/tudong/create') }}" class="btn btn-danger">Create</a>
    </div>
    <div class="panel panel-default Panel with panel-info class" >
        
        <div class="panel-heading" style="background-color: #000;color: white;">List</div>
        <div class="panel-body">
            <table class="table table-condensed table-hover">
                <tr>
                    <th style="width:100px;">Id</th>
                    <th>Thời gian</th>
                    <th style="width:100px;"></th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>
                        {{ $row->id }}
                    </td>
                    <td>{{ $row->thoigian }}</td>

                    <td style="text-align:center;">
                        <a href="{{ url('backend/tudong/update/'.$row->id) }}">Edit</a>&nbsp;
                        <a href="{{ url('backend/tudong/delete/'.$row->id) }}"
                            onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <style type="text/css">
                .pagination {
                    padding: 0px;
                    margin: 0px;
                }
            </style>
            {{ $data->render() }}
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Thư viện bootstrap-toggle -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap2-toggle.min.js"></script>
<script>
    $(document).ready(function() {
       
            var currentState =@json($bien);
            console.log(@json($bien));
            
            var updateURL = "http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/update/V6?value=" +
                currentState;
            $.get(updateURL, function(response) {
                console.log(currentState);
            });
    });

</script>
@endsection