<table id="tableUsers" class="table table-condensed table-responsive table-hover">
    <tr class=" text-center tableHeader">
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <td>Active</td>
        <td>Created</td>
        <td>Updated</td>
        <td></td>
    </tr>
    @foreach($users as $user)
        <tr class="text-center">
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->active}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>
                <form method="POST" action="{{URL::to('/')}}/deleteUser/{{$user->id}}">
                    {{Form::token()}}
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>        
     @endforeach
</table>