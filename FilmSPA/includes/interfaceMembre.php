<!-- _______________________  INTERFACE MEMBRE   _______________________-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">        
	<a class="navbar-brand" href="#">Films</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
	aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="../../view/membre/index.php"><i class="fas fa-home"></i>
					<span class="sr-only">(Página atual)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onClick="$('#divFormEditer').hide();$('#contenu').show();listerFilmsCards();">Nos films</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
					role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Categories
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" onClick="$('#divFormEditer').hide();$('#dviFormCreateUser').hide();$('#contenu').show();listerCategorie('Action');">Action</a>
					<a class="dropdown-item" onClick="$('#divFormEditer').hide();$('#dviFormCreateUser').hide();$('#contenu').show();listerCategorie('Comedie');">Comedie</a>
					<a class="dropdown-item" onClick="$('#divFormEditer').hide();$('#dviFormCreateUser').hide();$('#contenu').show();listerCategorie('Romance');">Romance</a>
					<a class="dropdown-item" onClick="$('#divFormEditer').hide();$('#dviFormCreateUser').hide();$('#contenu').show();listerCategorie('Drame');">Drame</a>
					<a class="dropdown-item" onClick="$('#divFormEditer').hide();$('#dviFormCreateUser').hide();$('#contenu').show();listerCategorie('Horreur');">Horreur</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link"  onClick="$('#contenu').hide(); $('#divFormEditer').show();">Editer Profil <i class="far fa-user"></i></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onClick="displayPanier();">Panier  <i class="fas fa-shopping-cart"></i></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onClick="logout()">Quitter <i class="fas fa-sign-in-alt"></i></a>
			</li>
			<li class="nav-item" style="padding-left: 400px;">
				<a class="nav-link" href="#"><?php if (isset ($_SESSION["membre"])){ echo $membre->getCourriel();  }  ?></a>
			</li>
		</ul>
	</div>
</nav>
