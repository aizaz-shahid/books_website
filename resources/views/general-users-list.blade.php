 @extends('/cms/main')
@section('content')
 <h3>Obooko - Users Listing - <b>Manage Users</b></h3>
                    <hr size=1>
@if(isset($user_del))
<div class="alert alert-success">
  <strong>Success!</strong> {{$user_del}}
</div>
@endif
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <h5>List of All Users Sorted By Last Name</b></h5>
                            <hr size=1>

                            <div class="row">
                                <div class="col-sm-1"><span style="font-size:12px;"><b>#</b></span></div>
                                <div class="col-sm-7"><span style="font-size:12px;"><b>UserName</b></span></div>
                                <div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
                                <div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
                            </div>
            {{$users->links()}}
                            
<?php $num_rows=0;?>
@foreach($users as $user)
<?php $num_rows=$num_rows+1;?>
                                <div class="row">
                                    <div class="col-sm-1">
                                            <span style="font-size:16px;">
                                                    <?php echo $num_rows; ?>
                                            </span>
                                    </div>
                                    <div class="col-sm-7">
                                            <span style="font-size:16px;">
                                                    <i style="color:#91C000;" class="fa fa-user"></i>&nbsp;&nbsp;<b>
                                                    <a href='{{ URL::to('/edit_user?id='.$user->user_id) }}'>{{$user->username}}</b>, &nbsp;
                                                     {{$user->email}}
                                                    </a>
                                            </span>
                                    </div>

                                    <div class="col-sm-2">
                                            <span style="font-size:16px;">
                                                    <a href='{{ URL::to('/edit_user?id='.$user->user_id) }}'>
                                                        <i style="color:#1C5192" class="fa fa-file"></i>
                                                    </a>
                                            </span>
                                    </div>
 
                                    <div class="col-sm-2">
                                            <span style="font-size:16px;">
                                                    <a href='{{ URL::to('/delete_user?id='.$user->id) }}' onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i style="color:#ff4040;" class="fa fa-times"></i>
                                                    </a>
                                            </span>
                                     </div>

                                </div>
                                 @endforeach
                                     </div>
                             <div class="col-sm-4">
                         </div>
                    </div>

                    @endsection