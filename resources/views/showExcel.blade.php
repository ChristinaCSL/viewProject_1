<table>
    <tr>
        <td colspan="2" style="background-color: blue">Category Data</td>
    </tr>
    <tr>
        <td width="150px">Category Name</td>
        <td width="150px">Created At</td>
    </tr>
        @foreach ($categories as $data )
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->created_at}}</td>
            </tr>
        @endforeach

        <tr></tr>
        <tr></tr>
    <tr>
        <td colspan="2" style="background-color: red">Book Data</td>
    </tr>
    <tr>
        <td style="width: 150px">Title</td>
        <td style="width: 150px">Author Name</td>
    </tr>
    @foreach ( $books as $value )
    <tr>
        <td>{{$value->title}}</td>
        <td>{{$value->authorname}}</td>
    </tr>
    @endforeach
</table>
