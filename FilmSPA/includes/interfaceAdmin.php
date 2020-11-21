<!-- ________________________________  INCLUDE INTERFACE ADMIN ________________________________-->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 ">        
<a class="navbar-brand">Films</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
	aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
	<ul class="navbar-nav">
		<li class="nav-item active">
			<a class="nav-link"  onClick="showDashboard();" >
				<i class="fas fa-home"></i>
				<span class="sr-only">(Página atual)</span>
			</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink"
			role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Gestion
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item"  onClick="literMembres();" >
					<i class="fas fa-users"></i>
					  Membres
				</a> 
				<a class="dropdown-item" onClick="listerFilms();">
					<i class="fas fa-video"></i>
					  Films
				</a>
			</div>
		</li>
		<li class="nav-item">
			<a id="emailShowUp" class="nav-link" href="#"></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../../view/login/logout.php">Quitter <i class="fas fa-sign-in-alt"></i></a>
		</li>
		<li class="nav-item" style="padding-left: 700px;">
			<a class="nav-link" href="#"><?php echo $membre->getCourriel();  ?></a>
		</li>
	</ul>
</div>
</nav>
