
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
					<li><?=HTML::decode(link_to_route('dashboard', '<i class="fa fa-home"></i>Dashboard', array(), ['class' => 'large button'])) ?></li>
					<li><?=HTML::decode(link_to_route('countriesall', '<i class="fa fa-book"></i>Countries', array(), ['class' => 'large button'])) ?></li>
					<li><?=HTML::decode(link_to_route('accountsall', '<i class="fa fa-book"></i>Accounts', array(), ['class' => 'large button'])) ?></li>


				</ul>

				<ul class="nav pull-right navbar-nav">

					<li class="dropdown pull right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"></span> </a>
						<ul class="dropdown-menu">
							<li><a href="homeen.php"><i class="fa fa-envelope"></i> Mails</a></li>
            
             
						</ul>
					</li>  
		  
					<li class="dropdown pull right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> </a>
						<ul class="dropdown-menu">
							<li>{{ link_to_route('logout', 'Logout', '<i class="fa fa-logout"></i>', array('class'=>'large button')) }}</li>


						</ul>
					</li> 
		 
		 
					<li class="dropdown pull right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span>Actions </a>
						<ul class="dropdown-menu">
							<li>{{ link_to_route('dashboard', '<i class="fa fa-book"></i>Issues', '', array('class'=>'large button')) }}</li>
							
						</ul>
					</li> 

	   
				</ul>
				
		  
			</div>
		</div>
	</nav>
	
