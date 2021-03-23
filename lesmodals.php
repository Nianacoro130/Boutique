<!-- Modal Login-->
<div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form id="form1" name="form1" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <ul id="messageFlash"></ul>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmailC"  aria-describedby="emailHelp" placeholder="Email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="">Mot de passe</label>
                            <input type="text" name="motdepasse" class="form-control" id="inputMdpC" placeholder="Mot de Passe"  value= "<?php if (isset($_POST['motdepasse'])) echo htmlentities(trim($_POST['motdepasse'])); ?>">
                        </div><br>
                        <div class="form-group">
                            <button type="submit" name="envoyer" class="btn btn-primary">Se connecter</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <small id="inscript" class="form-text text-muted"> Vous n'êtes pas inscrit ? <button type="button" id="btnlinkR">s'inscrire !</button></small>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>    
                </form>
                </div>
            </div>
        
        
        <!-- Modal Register-->
        <div class="modal fade" id="myModalR" tabindex="-1" role="dialog" aria-labelledby="myModalR" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form id="form2" name="form2"  method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="messager"></div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                            <input type="text" name="nom" class="form-control" id="inputNom"  placeholder="Nom">
                            </div>
                            <div class="col">
                            <input type="text" name="prenom" class="form-control" id="inputPrenom"  placeholder="Prenom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" name="adresse" class="form-control" id="inputAdr"  placeholder="Adresse">
                        </div>
                        <div class="form-row">
                            <div class="col-5">
                            <input type="text" name="ville" class="form-control" id="inputVille"  placeholder="Ville">
                            </div>
                            <div class="col">
                            <input type="text" name="codePostal" class="form-control" id="inputCdp"  placeholder="CodePostal">
                            </div>
                            <div class="col">
                            <input type="text"  name="numero" class="form-control" id="inputNum"  placeholder="Telephone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="email"  name="email" class="form-control" id="inputMail" aria-describedby="emailHelp" placeholder="Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-row">
                            <div class="col">
                            <input type="text"  name="motdepasse" class="form-control" id="inputMdp" placeholder="Mot de Passe">
                            </div>
                            <div class="col">
                            <input type="text"  name="mdpcomfirm" class="form-control" id="inputMdpCo" placeholder="Mot de passe Comfirm">
                            </div>
                        </div> 
                        <br>
                        <div class="form-group">
                            <button type="submit"  name="enregistrer" class="btn btn-primary">S'inscrire</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <small id="inscript" class="form-text text-muted"> Vous êtes  inscrit ? <button type="button" id="btnlinkCo">se connecter !</button></small>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

