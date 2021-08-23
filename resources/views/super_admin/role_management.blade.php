@extends('layouts.app')

@section('content')
    <h4>Role Management</h4>
    <div class="box-content">
        <!-- put your content here -->
        <script type="text/javascript">
            function myFunction() {
                var value = $('#searchh').val();
                $("#table tr").each(function (index) {
                    if (index !== 0) {

                        $row = $(this);


                        var id = $row.find("td:nth-child(2)").text();

                        if (id.indexOf(value) !== 0) {
                            $row.hide();
                        } else {
                            $row.show();
                        }
                    }
                });
            }
        </script>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <table class="table" id="table">

                        <thead class='thead-light'>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Company</th>
                            <th scope="col">Department</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->Location}}</td>
                                <td>{{$user->Department}}</td>
                                <td>
                                    @foreach($user->getRoleNames() as $role_name)
                                        <div class="chip">
                                            <div>{{$role_name}}</div>
                                        </div>
                                    @endforeach
                                </td>
                                <td><a href="{{route('edit_user_role',['user_id'=>$user->id])}}" class="btn btn-info">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>


            </div>
        </div>

@endsection
