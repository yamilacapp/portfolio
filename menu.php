<nav class="navbar navbar-expand-md navbar-dark ">
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo $pg=='inicio'? 'active': ''; ?>" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $pg=='sobre-mi'? 'active': ''; ?> " href="sobre-mi.php">Sobre mi</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link <?php echo $pg=='proyectos'? 'active': ''; ?>" href="proyectos.php" tabindex="-1" aria-disabled="true">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $pg=='contacto'? 'active': ''; ?>" href="contacto.php" tabindex="-1" aria-disabled="true">Contacto</a>
                        </li>

                    </ul>
                </div>
            </nav>