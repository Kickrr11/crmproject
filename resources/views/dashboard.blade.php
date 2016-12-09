@extends('master')
 
@section('content')

	<div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
		
		    <p class="pull-right visible-xs">
				<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
			</p>
          <div class="jumbotron">
            <h1>Welcome to CRM project</h1>
            <p>  </p>
          </div>
    <div class="row">
            
		<div class="col-xs-6 col-lg-4">
              <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                  <h3> </h3>
                  <p>Issues Total</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
               <div class="small-box-footer"> <li>{{ HTML::linkRoute('dashboard', 'Sign In', array(), array('class' => 'large button')) }} </li></div>
            </div>
        </div>
			
		<div class="col-xs-6 col-lg-4">
              <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                  <h3><sup style="font-size: 20px"></sup></h3>
                  <p>Projects Total</p>
                </div>
                <div class="icon">
                   <i class="fa fa-book"></i>
				</div>
               <div class="small-box-footer"> <li>{{ HTML::linkRoute('dashboard', 'Sign In', array(), array('class' => 'large button')) }} </li></div>

			</div>
        </div><!-- ./col -->
			
			
			    <div class="col-xs-6 col-lg-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3></h3>
                  <p>Contacts Total</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
               <div class="small-box-footer">{{ HTML::linkRoute('dashboard', 'Sign In', array(), array('class' => 'large button')) }} </div>
              </div>
            </div><!-- ./col -->
            <div class="col-xs-6 col-lg-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3></h3>
                  <p>Tasks</p>
                </div>
                <div class="icon">
                 <i class="fa fa-tasks"></i>
                </div>
               <div class="small-box-footer"> <li>{{ HTML::linkRoute('dashboard', 'Sign In', array(), array('class' => 'large button')) }} </li></div>
              </div>
            </div><!-- ./col -->
			
			<div class="col-xs-6 col-lg-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3></h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
               <div class="small-box-footer"> <?=HTML::decode(link_to_route('dashboard', 'More Info<i class="fa fa-arrow-circle-right"></i>', array(), ['class' => 'large button'])) ?></div>
              </div>
            </div><!-- ./col -->
			
	</div>
    </div><!--/row-->  
    
    
    
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
			<div class="list-group">
			<a href="#" class="list-group-item active">Recent Activity</a>
			@foreach ($latestactivity as $latestactivities)
				
				<a href="#" class="list-group-item"><p>{{$latestactivities->id}} </p><p>username:{{$latestactivities->user->username}} </p>{{$latestactivities->description}}<p>{{$latestactivities->created_at}} </p></a>
			@endforeach
			</div>
			
        </div><!--/.sidebar-offcanvas-->
   
	
   </div><!--/row-->
	

@endsection
