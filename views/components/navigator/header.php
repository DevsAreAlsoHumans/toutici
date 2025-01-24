<header class="container">
    <nav>
        <li>
            <h2>
                <a class="logo" href="/toutici/">Tout ici</a>
            </h2>
        </li>
        <li>
            <input type="search" id="search" name="search" placeholder="Chercher une annonce" />
        </li>
        <li>
            <?php
            if (isset($user)) {
                echo "
                <ul>
                    <li>
                        <a href='/toutici/announcement/create'>
                            <button>
                                Créer une annonce
                            </button>
                        </a>
                    </li>
                    <li></li>
                    <li>
                        <a href='/toutici/user/" . $user['id'] . "'>
                            <button>Bienvenue <strong>" . $user['first_name'] . "</strong></button>
                        </a>
                    </li>
                    <li></li>
                    <li>    
                        <a href='/toutici/logout'>
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
                            <a href='/toutici/login'>
                                <button>
                                    Se Connecter
                                </button>
                            </a>
                        </li>
                        <li></li>
                        <li>
                            <a href='/toutici/register'>
                                <button>
                                    Créer un compte
                                </button>
                            </a>
                        </li>
                    </ul>
                ";
            }
            ?>
        </li>
    </nav>
</header>