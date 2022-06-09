@extends('layouts.app')
@section('content')
<style type="text/css">
	.btn {
    font-size: medium;
}
</style>
<div id="content-container">
    <div class="pageheader">
        <div id="page-content">
            <div class="panel">

                <div class="panel-heading ">
                    <h3 class="panel-title">All User                    
                    <!-- <a href="{{config('app.baseURL')}}/package/add"><button style="margin-top:10px;" type="submit" class="btn pull-right btn-primary panel-button">Add Package</button></a></h3> -->
                </div>
               
                <div class="panel-body">
                    <table class="table table-bordered col-md-12 col-sm-12" id="myTable" style="padding-right: 0px;
                    padding-left: 0px;" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
           
            	
        </div>

    </div>

</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#myTable").dataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            ajax:"{{config('app.baseURL')}}/user/allData/",
            "order":[
            [0,"asc"]
            ],
            "columns":[
            {
                "mData":"id"
            },{
                "mData":"name"
            },{
                "mData":"email"
            },{
                "mData":"contact_number"
            },{
                "mData":"address"
            },]
            
        });
    });
</script>
@endsection