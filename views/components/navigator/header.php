<header class="container">
    <nav class="nav">
        <ul>
            <li>
                <h2>
                    <a class="logo" href="/">Tout ici</a>
                </h2>
            </li>

        </ul>
        <ul>
            <li>
                <form action="/search" method="get">
                    <fieldset role="group" style="margin: 0">
                        <input type=" text" id="search" name="search" placeholder="Chercher une annonce" />
                        <input type="submit" value="Rechercher" />
                    </fieldset>
                </form>
            </li>
        </ul>
        <ul>
            <?php
            if (isset($user)) {
                echo "
                <ul>
                    <li>
                        <a href='/announcement/create'>
                            <button>
                                Créer une annonce
                            </button>
                        </a>
                    </li>
                    <li></li>
                    <li>
                        <a href='/user/" . $user['id'] . "'>
                            <button>Bienvenue <strong>" . $user['first_name'] . "</strong></button>
                        </a>
                    </li>
                    <li></li>
                    <li>    
                        <a href='/logout'>
                            <button>
                                Se Déconnecter
                            </button>
                        </a>
                    </li>
                </ul>
                ";
            } else {
                echo "<ul>
                        <li>
                            <a href='/login'>
                                <button>
                                    Se Connecter
                                </button>
                            </a>
                        </li>
                        <li></li>
                        <li>
                            <a href='/register'>
                                <button>
                                    Créer un compte
                                </button>
                            </a>
                        </li>
                    </ul>
                ";
            }
            ?>
        </ul>
    </nav>
</header>