@extends('master')
 
@section('content')

    <div class="row row-offcanvas row-offcanvas-right">
	
        <div class="col-xs-12 col-sm-9">
		
            <p class="pull-right visible-xs">
		<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <div class="jumbotron">
                <h1>Welcome to CRM project</h1>

            </div>
            <div class="row">
            
		<div class="col-xs-6 col-lg-6">
              <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{App\Country::count()}} </h3>
                                <p>Coutries</p>
                        </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                        <div class="small-box-footer"> {!!HTML::decode(link_to_route('countriesall', 'More Info<i class="fa fa-arrow-circle-right"></i>', array(), ['class' => 'large button'])) !!}</div>
                    </div>
                </div>
			
		<div class="col-xs-6 col-lg-6">
              <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{App\Account::count()}} </h3>
                            <p>Accounts</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="small-box-footer"> {!!HTML::decode(link_to_route('dashboard', 'More Info<i class="fa fa-arrow-circle-right"></i>', array(), ['class' => 'large button'])) !!}</div>

                    </div>
                </div><!-- ./col -->
			
			
		<div class="col-xs-6 col-lg-6">
              <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{App\Contact::count()}}</h3>
                            <p>Contacts</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="small-box-footer"> {!!HTML::decode(link_to_route('dashboard', 'More Info<i class="fa fa-arrow-circle-right"></i>', array(), ['class' => 'large button'])) !!}</div>
                    </div>
                </div><!-- ./col -->

			
		<div class="col-xs-6 col-lg-6">
              <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                          <h3>{{App\User::count()}}</h3>
                          <p>Users</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-user"></i>
                        </div>
                       <div class="small-box-footer"> {!!HTML::decode(link_to_route('dashboard', 'More Info<i class="fa fa-arrow-circle-right"></i>', array(), ['class' => 'large button'])) !!}</div>
                    </div>
                </div><!-- ./col -->
			
            </div>
        </div><!--/row-->  
    
    
    
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
		<a href="#" class="list-group-item active">Recent Activity</a>
                @foreach ($latestactivity as $latestactivities)
                    <a href="#" class="list-group-item">
                    <div class="row">
			<div class="col-xs-3 col-sm-3 sidebar-offcanvas">
                            <p>#{{$latestactivities->id}} </p>
			</div>
					
			<div class="col-xs-9 col-sm-9 sidebar-offcanvas">
                            <p><p>username:{{$latestactivities->user->username}} </p>{{$latestactivities->description}}<p>{{$latestactivities->created_at}} </p> </p>
			</div>
				
                    </div>
                    </a>
		@endforeach
            </div>
                {{$latestactivity->links()}}
        </div><!--/.sidebar-offcanvas-->

   
	
    </div><!--/row-->


@endsection
