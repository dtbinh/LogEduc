<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cours sur les instruments</title>

    <!-- Bootstrap -->
    <!-- inclusion du style CSS de base -->
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        margin: auto;
    }
    h1 {
        text-align: center;
    }

    p {
        font-size: 17px;
    }
    li {
        font-size: 15px;
    }


</style>

<body>
<div class="row titre">
    <div class="col-sm-8 col-sm-offset-2">
        <h2><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Les instruments de musique</h2>
        <p>Un instrument de musique est un objet capable de produire des sons et utilisé pour jouer de la musique.</p>

    </div>
    <div class="col-sm-1">
        <br/>
        <header>
            <nav>
                <table>
                    <tr>
                        <td>
                            <a href="/LogEduc/"><button class="btn btn-success">Menu</button></a>
                        </td>
                        <td><a href="/LogEduc/Exercices/Instruments/indexEx.php"><button class="btn btn-primary">Exos</button></a>
                        <td>

                            <form method="post" action="../../../Controller/Login_controller.php">
                                <input type="hidden" name="deconnexion" />
                                <input type="submit"class="btn btn-danger" value="Quitter" />
                            </form>
                        </td>
                    </tr>
                </table>
            </nav>
        </header>
    </div>

</div>
<section class="container well">



    <div class="row">
        <div class="">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#vent" data-toggle="tab">Instruments à vent</a></li>
                <li><a href="#cordes" data-toggle="tab">Instruments à cordes</a></li>
                <li><a href="#percussion" data-toggle="tab">Instruments à percussion</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active fade in" id="vent">
                    <form class="well" role="form">

                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <p>Les instruments à vent constituent une grande famille d'instruments de musique dont le son est produit grâce au souffle du musicien. Ils sont répartis en deux sous-familles : les <code>bois</code> et les <code>cuivres</code>.</p>
                                <p>Une caractéristique importante des instruments à vent est la forme intérieure du tube (on parle de perce), qui détermine le timbre de chaque instrument. La perce est soit cylindrique, soit conique, plus rarement un mélange des deux.</p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/cuivre.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <h4><span class="label label-danger">Les bois</span></h4>
                                <p>Le nom de cette sous-famille fait référence au matériau avec lequel sont fabriqués les instruments. Mais il y a des exceptions : par exemple la flûte traversière et le saxophone, fabriqués en métal !</p>
                                <p> Le critère pour classer les instruments à vent dans cette sous-famille est la façon de produire les notes, en bouchant ou débouchant des trous situés le long du tube de chaque instrument.</p>
                                <p><ul>
                                <li>La flûte à bec</li>
                                <li>La flûte traversière</li>
                                <li>Le saxophone</li>
                            </ul></p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/fluteBec.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <h4><span class="label label-warning">Les cuivres</span></h4>
                                <p>Les instruments de cette sous-famille sont pour la plupart construits en laiton (et pas en... cuivre, qui est un métal trop mou). Mais il y a aussi des exceptions : par exemple le cor des Alpes, tout en bois !</p>
                                <p>Les instruments à vent de cette sous-famille sont ceux dont on produit les notes en soufflant plus ou moins fort dans le « tuyau » (et, pour certains, en allongeant ou raccourcissant la longueur du tube, par exemple avec un système de pistons ou une coulisse).</p>
                                <p><ul>
                                <li>La trompette</li>
                                <li>Le tuba </li>
                            </ul></p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/tuba.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <h4><span class="label label-success">Les cas particuliers</span></h4>
                                <ul>
                                    <li>L'accordéon : le son est bien produit par du vent, mais ce n'est pas le souffle du musicien qui le produit, mais l'actionnement du soufflet de l'instrument.</li>
                                    <li>L'orgue : bien que se jouant à l'aide d'un ou de plusieurs claviers, l'orgue est aussi un instrument à vent, puisque c'est l'air d'une soufflerie (électrique dans les orgues contemporains, mais manuelle dans les orgues historiques) qui produit les sons.</li>
                                    <li>La voix : La voix (humaine) utilise le souffle du chanteur, mais l'air en provenance des poumons met en vibration les... cordes vocales !</li>
                                </ul>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/accordeon2.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="cordes">
                    <form class="well" role="form">

                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <p>Un instrument à cordes est un instrument de musique dont la partie sonore est constituée par une ou plusieurs cordes. C'est la vibration des cordes qui produit le son de l'instrument.</p>
                                <p>Créés par la propre main de l'homme, il existe des instruments à cordes <code>pincées</code>, <code>frottées</code> ou <code>frappées</code>.</p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/guitareElec.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <h4><span class="label label-danger">Instruments à cordes pincées</span></h4>
                                <p>Un instrument à cordes pincées est un instrument de musique dont les notes sont produites par le pincement des cordes.</p>
                                <p><ul>
                                <li>La harpe</li>
                                <li>Le banjo</li>
                                <li>La guitare</li>
                            </ul></p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/harpe.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <h4><span class="label label-warning">Instruments à cordes frottées</span></h4>
                                <p>Un instrument à cordes frottées est un instrument de musique dont les notes sont produites par le frottement, généralement d'un archet, sur les cordes.</p>
                                <p><ul>
                                <li>Le violon et l'alto</li>
                                <li>La contrebasse à cordes</li>
                                <li>Le violoncelle</li>
                            </ul></p>                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/violon.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                            <h4><span class="label label-success">Instruments à cordes frappées</span></h4>
                            <p>Un instrument à cordes frappées est un instrument de musique dont les notes sont produites par la frappe manuelle des cordes, avec des petites baguettes ou de petits marteaux (mailloches).</p>
                            <p>
                            <ul>
                                <li>Le piano</li>
                            </ul>
                            </p>
                                </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/cordes.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade" id="percussion">
                    <form class="well" role="form">

                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <p>Les instruments à percussion sont des instruments de musique que l'on frappe avec ou sans ses mains. Par exemple, on utilise deux bâtons pour frapper sur la batterie, contrairement au djembé, sur lequel on utilise seulement ses mains.</p>
                                <p>Les instruments à percussion sont d'une certaine manière plus simples que les instruments à vent, car nous n'avons pas besoin de notre souffle pour faire fonctionner les instruments à percussions. Mais bien sûr, cela dépend des instruments.</p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/djembe.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <h4><span class="label label-danger">Exemples</span></h4>
                                <p><ul>
                                <li>Batterie</li>
                                <li>Bongo</li>
                                <li>Tambour</li>
                                <li>Tam-tam</li>
                            </ul></p>
                            </div>
                            <div class="col-sm-5 col-md-3"><img class="img-responsive img-rounded  thumbnail" src="img/tambour.jpg"></div>
                            <div class="col-md-1">
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>

    </div>

    </div>
</section>




</body>
</html>