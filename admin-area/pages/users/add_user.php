
<?php ?>

<div class="pagetitle">
    <h1>Utilisateur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php?page=widget">Acceuil</a></li></li>
            <li class="breadcrumb-item active">Ajouter utilisateur</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data" class="row g-3 py-5">

                <div class="col-md-6"> 
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer nom">
                </div>
                <div class="col-md-6"> 
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer prenom">
                </div>

                <div class="col-md-12"> 
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrer e-mail">
                </div>

                <div class="col-md-12"> 
                    <label for="mot_passe" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="mot_passe" id="mot_passe" placeholder="Entrer mot de passe">
                </div>

                <div class="col-md-12"> 
                    <label for="role" class="form-label">Role</label> 
                    <select class="form-select" name="role" aria-label="Default select example">
                        <option selected disabled>Choisir</option>
                        <option value="2">Administrateur</option>
                        <option value="1">Super administrateur</option>
                        <option value="0">Participant</option>
                    </select>
                </div>

                <div class="col-md-12"> 
                    <label for="telephone" class="form-label">Telephone</label> 
                    <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Entrer numero de telephone">
                </div>

                <div class="col-md-6"> 
                    <label for="pays" class="form-label">Pays</label> 
                    <select class="form-select" name="pays" aria-label="Default select example">
                        <option selected disabled>Choisir</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Congo">Congo</option>
                    </select>
                </div>
                <div class="col-md-6"> 
                    <label for="passport" class="form-label">Numero de passport</label> 
                    <input type="text" class="form-control" name="passport" id="passport" placeholder="Entrer numero de passport">
                </div>

                <div class="col-md-12"> 
                    <label for="rotary" class="form-label">Rotary</label> 
                    <input type="text" class="form-control" name="rotary" id="rotary" placeholder="Entrer addresse">
                </div>

                <div class="col-md-4"> 
                    <label for="photo" class="form-label">Photo</label> 
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                
                <div class=" text-end"> 
                    <button type="submit" class="btn btn-success" name="submit">Enregistrer</button> 
            </form>
        </div>
    </div>
</section>
