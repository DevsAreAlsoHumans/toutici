<header class="container">
    <nav>
        <ul>
            <li>
                <h2>
                    <a style='width: max-content;' class="logo" href="/">Tout ici</a>
                </h2>
            </li>

        </ul>
        <ul>
            <li></li>
        </ul>
        <ul class="search">
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
            <li></li>
        </ul>
        <ul>
            <?php
            if (isset($user)) {
                echo "
                <ul>
                    <li>
                        <a href='/user/" . $user['id'] . "'>
                            <button style='width: max-content;'>Bienvenue <i>" . $user['first_name'] . "</i></button>
                        </a>
                    </li>
                    <li></li>
                    <li>    
                        <a href='/logout'>
                            <button>
                                Déconnexion
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