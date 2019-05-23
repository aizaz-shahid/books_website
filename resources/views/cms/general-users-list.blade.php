 @extends('/cms/main')
@section('content')
 <h3>Obooko - Users Listing - <b><a href="/users_list" style="text-decoration:none">Manage Users</a></b></h3>
                    <hr size=1>
@if(isset($user_del))
<div class="alert alert-success">
  <strong>Success!</strong> {{$user_del}}
</div>
@endif
                    <div class="row">
                        <div class="col-sm-10 col-xs-12 col-md-12">
                        <div class="row">
                        <div class="col-lg-12">
                            <h5>List of All Users Sorted By Last Name</b></h5>
                            </div>
                            <div class="col-lg-6">
                            <form method="get" action='/users_list'>
  <div class="input-group">
     
      <input type="text" name="q" class="form-control" placeholder="Search by username,email,gender,country,group">
       <span class="input-group-btn">
	<input type="text" name="r" class="form-control" style="width:70px">&nbsp
        <button class="btn btn-default" type="submit">Search</button>
      </span>
    </div><!-- /input-group -->
                            </form>
                            </div>
<div class="col-lg-4" style="text-align:right;">
@if(isset($selected_items))
 <strong>{{$selected_items}} Users</strong>
@else
<strong>0 Selected</strong>
@endif
</div>
                           
</div>
 <hr size=1>
 <div id='paging_container1'>
            <!--<div class='page_navigation col-md-12'></div>-->
            {{$users->appends(Request::except('page'))->links()}}
            <ul class="content">
                            <div class="row">
                                <div class="col-sm-1"><span style="font-size:12px;"><b>Edit</b></span></div>
                                <div class="col-sm-3"><span style="font-size:12px;"><b>UserName</b></span></div>
                                <div class="col-sm-2"><span style="font-size:12px;"><b>Name</b></span></div>
                                <div class="col-sm-3"><span style="font-size:12px;"><b>Country</b></span></div>
				<div class="col-sm-1"><span style="font-size:12px;"><b>Group</b></span></div>
                                <div class="col-sm-1"><span style="font-size:12px;"><b>Gender</b></span></div>
                                <div class="col-sm-1"><span style="font-size:12px;"><b>Del</b></span></div>

                            </div>
            
                            
<?php $num_rows=0;?>
@foreach($users as $user)
<?php $num_rows=$num_rows+1;?>
                                <div class="row">
                                                                        <div class="col-sm-1">
                                            <span style="font-size:16px;">
                                                    <a href='{{ URL::to('/edit_user?id='.$user->user_id) }}'>
                                                        <i style="color:#1C5192" class="fa fa-file"></i>
                                                    </a>
                                            </span>
                                    </div>

                                    <div class="col-sm-3">
                                            
						<span style="font-size:16px;">
                                                    <i style="color:#91C000;" class="fa fa-user"></i>&nbsp;&nbsp;<b>
                                                    <a href='{{ URL::to('/edit_user?id='.$user->user_id) }}'>{{$user->username}}</b>, &nbsp;
                                                     {{$user->email}}
                                                    </a>
                                            </span>
                                    </div>
                                    <div class="col-sm-2">
                                            <span style="font-size:16px;">{{$user->first_name}}
                                                                                               </span>
                                     </div>
                                    <div class="col-sm-3">
                                            <span style="font-size:16px;">{{$user->country}}
                                                                                               </span>
                                     </div>
					<div class="col-sm-1">
                                            <span style="font-size:16px;">{{$user->type}}

                                                                                               </span>
                                     </div>
                                    <div class="col-sm-1">
                                            <span style="font-size:16px;">{{$user->gender}}

                                                                                               </span>
                                     </div>
                                      <!--<div class="col-sm-2">
                                            <span style="font-size:16px;">
                                                    {{ date('m-d-Y', strtotime($user->created_at)) }}
                                            </span>
                                     </div>-->
                                        <div class="col-sm-1">
                                            <span style="font-size:16px;">
                                                    <a href='{{ URL::to('/delete_user?id='.$user->user_id) }}' onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i style="color:#ff4040;" class="fa fa-times"></i>
                                                    </a>
                                            </span>
                                     </div>

                                </div>
                                 @endforeach
                                     </div>
                                     <ul>
                                     </div>
                                                 </div>

                    @endsection
@section('custom_javascript')
 <script type='text/javascript'>
      $(document).ready(function(){
        $('#paging_container1').pajinate({
          items_per_page : 39

          
        });
      });
        </script>
@endsection