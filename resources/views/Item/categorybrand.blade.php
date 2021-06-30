@extends('layouts.app')

@section('content')
<h3>Brand or Item Type List</h3>

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
                                    <a class="btn btn-lg btn-default" href="Brand/create/">Add New</a>
         <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1000px;" id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()" >
       </div>
         <div class="form-group row">
<!--          <a href="docAdd.php"><i class="glyphicon glyphicon-plus"></i><span>New</span></a> -->



           <table class="table" id="table">
		   <thead class='thead-light'>
  <tr>




    <th scope="col">Category</th>
    <th scope="col">Brand / Item Type</th>

    <th scope="col">Action </th>
  </tr>
  </thead>
  <tbody>

      @if(count($items) >= 1)
  		@foreach($items as $item)
  <tr>

      		<div class="well">

                <td>{{ $item->Type }}</td>
      	  		<td>{{ $item->Brand }}</td>

      	  		<td >
 <div class="row">


            <a style="white-space: nowrap;"  type="button" href="/Brand/{{ $item->SBID }}/edit" class="btn btn-default btn-sm">Edit</a>

           <form method="POST" action="/Brand/{{ $item->SBID }}">
           {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button    type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
        </div>
</td>

      		</div>
   </tr>
      	@endforeach


	@else
  <td>No Item Found</td>


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
 {{ $items->links("pagination::bootstrap-4") }}
</div>

            </div>
        </div>

@endsection()
