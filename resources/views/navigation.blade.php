
    <nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
            <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
		</button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
                    <li>{!!HTML::decode(link_to_route('dashboard', '<i class="fa fa-home"></i>Dashboard', array(), ['class' => 'large button'])) !!}</li>
                    <li>{!!HTML::decode(link_to_route('countriesall', '<i class="fa fa-book"></i>Countries', array(), ['class' => 'large button'])) !!}</li>
                    <li>{!!HTML::decode(link_to_route('accountsall', '<i class="fa fa-book"></i>Accounts', array(), ['class' => 'large button'])) !!}</li>


                </ul>

		<ul class="nav pull-right navbar-nav">

                    <li class="dropdown pull right">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span>Actions </a>
			<ul class="dropdown-menu">
						
                            <li>{!!HTML::decode(link_to_route('newaccount','<span class="glyphicon glyphicon-plus"></span>Add account', array(), ['class' => 'large button'])) !!}</li>
                            <li>{!!HTML::decode(link_to_route('newcountry','<span class="glyphicon glyphicon-plus"></span>Add Country', array(), ['class' => 'large button'])) !!}</li>

			</ul>
                    </li> 
					
							  
                    <li class="dropdown pull right">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> </a>
			<ul class="dropdown-menu">
                            <div class="navuser">
				<div class="row">
                                    <div class="col-lg-4">
					<p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
					</p>
                                    </div>
									
                                    <div class="col-lg-8">
					<p class="text-left"><strong>{{Auth::user()->username}}</strong></p>
					<p class="text-left small">{{Auth::user()->email}}</p>
					<p class="text-left">
					{{ HTML::linkRoute('users', 'Profile' , array(Auth::user()->id)) }}

					</p>
                                    </div>
									
                                    <li class="divider"></li>
					<li>
                                            <div class="navbar-login navbar-login-session">
						<div class="row">
                                                    <div class="col-lg-12">
							<p>
                                                            {{ link_to_route('logout', 'Logout', '<i class="fa fa-logout"></i>', array('class'=>'btn btn-danger btn-block')) }}

                                                        </p>
                                                    </div>
						</div>
                                            </div>
										
                                </div>
                            </div>

			</ul>
                    </li> 	   
		</ul>

            </div>
	</div>
    </nav>
	
