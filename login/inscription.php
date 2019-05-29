<link href="../style/reset.css" rel="stylesheet">
<link href="../style/signup.css" rel="stylesheet" />

<div class="left__signup">
    </div>
 
    <div class="right__signup">
        <h1>JOIN US.</h1>
        <form action="validation.php" method="post" class="formulary">
            <label>Your SuperHero Name :</label>
            <input type="text" name="pseudo"><br>
            <div class="row__name">
                <div>
                        <label>First Name :</label><br>
                        <input type="text" name="prenom" class="row__name-user"><br>
                </div>
                <div>
                        <label>Last Name :</label> <br>
                        <input type="text" name="nom" class="row__name-user"><br>
                </div>
            </div>
            <label>Email :</label>
            <input type="email" name="email">
            <br>
            <div class="row__name">
                    <div>
                            <label>Password :</label><br>
                            <input type="password" name="password"><br>
                    </div>
                    <div>
                            <label>Confirm password :</label><br>
                            <input type="password" name="repeatpassword">
                            <br>
                    </div>
                </div>
            <input type="submit" name="ajouter" value="Enregistrer">
        
        </form>
    </div>