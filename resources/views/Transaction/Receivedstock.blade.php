@extends('layouts.app')

@section('content')
<h3>Received Item List</h3>

         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="box-content">
                <!-- put your content here -->
                <script type="text/javascript">
                function myFunction(){
  var value = $('#searchh').val();
$("#table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);


            var id = $row.find("td:nth-child(2)").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
}
</script>
<div class="card">
<div class="card-body">


                                    <div class="form-group row">

         <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1000px;" id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()" >
       </div>
         <div class="form-group row">
<!--          <a href="docAdd.php"><i class="glyphicon glyphicon-plus"></i><span>New</span></a> -->



           <table class="table" id="table">
           <thead>
  <tr>


    <th scope="col">Event Name</th>
    <th scope="col">Event Type</th>
    <th scope="col">Event Location</th>
    <th scope="col">Requester</th>
    <th scope="col">Return date</th>
    <th scope="col">Remaing Date For Return</th>
    <th scope="col">Status</th>

    <th scope="col">First Approval</th>
    <th scope="col">Second Approval</th>
     <th scope="col">Action</th>


  </tr>
  </thead>
  <tbody>

      @if(count($category) >= 1)
        @foreach($category as $item)
  <tr>

            <div class="well">
                <td>{{ $item->Event_Name }}</td>
            <td>{{ $item->Event_Type }}</td>
            <td>{{ $item->Location }}</td>
            <td>{{ $item->Requester }}</td>
            <td>{{ $item->Return_date }}</td>
            <td></td>
            @if($item->ApprovalOne == 'Approver')
            <td>Approved</td>
            @else
            <td>Approval Pending</td>
            @endif
            <td>{{ $item->ApprovalOne }}</td>
            <td>{{ $item->ApprovalTwo }}</td>

                <td >
 <div class="row">



            <a style="white-space: nowrap; background-color: red;"  type="button" href="/Received/{{ $item->EVID }}/test" class="btn btn-danger btn-md">Recived</a>


        </div>
</td>

            </div>
   </tr>
        @endforeach


    @else
  <td>No Event Found</td>


@endif



  </tbody>
  <script type="text/javascript">

   function downloadURI(uri, name)
{
  alert(uri);
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}
  </script>

           </table>
         </div>
           <div  class="d-flex justify-content-left">

</div>

            </div>
        </div>

@endsection()
