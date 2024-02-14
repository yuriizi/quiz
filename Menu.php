<?php
include_once 'Config.php';
session_start();
if (!(isset($_SESSION['email']))) {
    header("location:Login.php");
} else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    include_once 'Config.php';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Quiz</title>
    <link rel="icon" href="data:image/png;base64,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" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <style type="text/css">
        body {
            width: 100%;
            background-color: #09001d;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Javascript:void(0)"><b>Menu</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="Menu.php?q=1">Quiz Disponíveis<span class="sr-only">(current)</span></a></li>
                    <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>> <a href="Menu.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Histórico</a></li>
                    <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>> <a href="Menu.php?q=3"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;Ranking</a></li>
                    <li class="dropdown <?php
                                        if (@$_GET['q'] == 4 || @$_GET['q'] == 5)
                                            echo 'active"';
                                        ?>">
                    <li><a href="Menu.php?q=4">Criar novo Quiz</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo ''; ?>> <a href="Logout.php?q=Menu.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (@$_GET['q'] == 1) {
                    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                    echo '<div class="panel">
                    <div class="table-responsive">
                    <table class="table table-striped title1">
                    <tr><td><center><b>Id</b></center></td>
                        <td><center><b>Nome do Quiz</b></center></td>
                        <td><center><b>Número de Perguntas</b></center>
                        <td><center><b>Data de Criação</b></center>
                        </td><td><center></center></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $hitscore = $row['hitscore'];
                        $quizid = $row['quizid'];
                        $date = $row['date'];
                        $q12 = mysqli_query($con, "SELECT score FROM history WHERE quizid='$quizid' AND email='$email'") or die('Error98');
                        $rowcount = mysqli_num_rows($q12);
                        if ($rowcount == 0) {
                            echo '<tr><td><center>' . $c++ . '</center></td><td><center>' . $title . '</center></td><td><center>' . $total . '</center><td><center>' . $date . '</center><td><center><b><a href="Menu.php?q=quiz&step=2&quizid=' . $quizid . '&n=1&t=' . $total . '" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Começar</b></span></a></b></center></td></tr>';
                        } else {
                            echo '<tr style="color:#99cc32"><td><center>' . $c++ . '</center></td><td><center>' . $title . '&nbsp;<span title="Este Quiz já foi resolvido!" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>' . $total . '</center></td><td><center>' . $date . '</center></td><td><center><b><a href="Functions.php?q=quizre&step=25&quizid=' . $quizid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="color:black;margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></center></td></tr>';
                        }
                    }
                    $c = 0;
                    echo '</table></div></div>';
                }

                if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
                    $quizid = @$_GET['quizid'];
                    $sn = @$_GET['n'];
                    $total = @$_GET['t'];
                    $q = mysqli_query($con, "SELECT * FROM questions WHERE quizid='$quizid' AND sn='$sn' ");
                    echo '<div class="panel" style="margin:5%">';
                    while ($row = mysqli_fetch_array($q)) {
                        $qns = $row['qns'];
                        $questionsid = $row['questionsid'];
                        echo '<b>Questão &nbsp;' . $sn . '&nbsp;::<br /><br />' . $qns . '</b><br /><br />';
                    }
                    $q = mysqli_query($con, "SELECT * FROM options WHERE questionsid='$questionsid' ");
                    echo '<form action="Functions.php?q=quiz&step=2&quizid=' . $quizid . '&n=' . $sn . '&t=' . $total . '&questionsid=' . $questionsid . '" method="POST"  class="form-horizontal">
                    <br />';

                    while ($row = mysqli_fetch_array($q)) {
                        $option = $row['option'];
                        $optionid = $row['optionid'];
                        echo '<input type="radio" name="ans" value="' . $optionid . '">&nbsp;' . $option . '<br /><br />';
                    }
                    echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div>';
                }

                if (@$_GET['q'] == 'result' && @$_GET['quizid']) {
                    $quizid = @$_GET['quizid'];
                    $q = mysqli_query($con, "SELECT * FROM history WHERE quizid='$quizid' AND email='$email' ") or die('Error157');
                    echo '<div class="panel">
                    <center><h1 class="title" style="color:#660033">Resultado</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                    while ($row = mysqli_fetch_array($q)) {
                        $s = $row['score'];
                        $w = $row['wrong'];
                        $r = $row['hitscore'];
                        $qa = $row['level'];
                        echo '<tr style="color:#66CCFF"><td>Total de Perguntas</td><td>' . $qa . '</td></tr>
                            <tr style="color:#99cc32"><td>Respostas Certas&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
                            <tr style="color:red"><td>Respostas Erradas&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
                            <tr style="color:#66CCFF"><td>Pontuação&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
                    }
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ") or die('Error157');
                    while ($row = mysqli_fetch_array($q)) {
                        $s = $row['score'];
                        echo '<tr style="color:#990000"><td>Pontuação Geral&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
                    }
                    echo '</table></div>';
                }
                ?>

                <?php
                if (@$_GET['q'] == 2) {
                    $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
                    echo '<div class="panel title">
                    <table class="table table-striped title1" >
                    <tr style="color:black;"><td><center><b>Id</b></center></td><td><center><b>Nome do Quiz</b></center></td><td><center><b>Questões Resolvidas</b></center></td><td><center><b>Acertos</b></center></td><td><center><b>Erros<b></center></td><td><center><b>Pontuação</b></center></td>';
                    $c = 0;
                    while ($row = mysqli_fetch_array($q)) {
                        $quizid = $row['quizid'];
                        $s = $row['score'];
                        $w = $row['wrong'];
                        $r = $row['hitscore'];
                        $qa = $row['level'];
                        $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  quizid='$quizid' ") or die('Error208');
                        while ($row = mysqli_fetch_array($q23)) {
                            $title = $row['title'];
                        }
                        $c++;
                        echo '<tr><td><center>' . $c    . '</center></td><td><center>' . $title . '</center></td><td><center>' . $qa . '</center></td><td><center>' . $r . '</center></td><td><center>' . $w . '</center></td><td><center>' . $s . '</center></td></tr>';
                    }
                    echo '</table></div>';
                }

                if (@$_GET['q'] == 3) {
                    $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC ") or die('Error223');
                    echo '<div class="panel title"><div class="table-responsive">
                    <table class="table table-striped title1" >
                    <tr style="color:red"><td><center><b>Colocação</b></center></td><td><center><b>Usuário</b></center></td><td><center><b>Email</b></center></td><td><center><b>Pontuação</b></center></td></tr>';
                    $c = 0;

                    while ($row = mysqli_fetch_array($q)) {
                        $e = $row['email'];
                        $s = $row['score'];
                        $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
                        while ($row = mysqli_fetch_array($q12)) {
                            $name = $row['name'];
                        }
                        $c++;
                        echo '<tr><td style="color:black"><center><b>' . $c . '</b></center></td><td><center>' . $name . '</center></td><td><center>' . $e . '</center></td><td><center>' . $s . '</center></td></tr>';
                    }
                    echo '</table></div></div>';
                }
                ?>

                <?php
                if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
                    echo '<div class="row"><span class="title1" style="margin-left:31%;font-size:30px;color:#fff;"><b>Insira as informações do Quiz</b></span><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6">   
                        <form class="form-horizontal title1" name="form" action="Functions.php?q=addquiz"  method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <input id="name" name="name" placeholder="Nome do Quiz" class="form-control input-md" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="total"></label>  
                                    <div class="col-md-12">
                                        <input id="total" name="total" placeholder="Número de perguntas" class="form-control input-md" type="number">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12"> 
                                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Criar" class="btn btn-primary"/>
                                    </div>
                                </div>
                            </fieldset>
                        </form></div>';
                }
                ?>

                <?php
                if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
                    echo ' 
                        <div class="row">
                        <span class="title1" style="margin-left:40%;font-size:30px; color:white;"><b>Insira as perguntas</b></span><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="Functions.php?q=addqns&n=' . @$_GET['n'] . '&quizid=' . @$_GET['quizid'] . '&ch=4 "  method="POST">
                        <fieldset>
                        ';
                    for ($i = 1; $i <= @$_GET['n']; $i++) {
                        echo '<span style="color:white;"><b>Pergunta número&nbsp;' . $i . '&nbsp;:</b></span><br />
                        <div class="form-group">
                                        <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Pergunta número ' . $i . '"></textarea>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                                        <div class="col-md-12">
                                            <input id="' . $i . '1" name="' . $i . '1" placeholder="Opção A" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                                        <div class="col-md-12">
                                            <input id="' . $i . '2" name="' . $i . '2" placeholder="Opção B" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                                        <div class="col-md-12">
                                            <input id="' . $i . '3" name="' . $i . '3" placeholder="Opção C" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                                        <div class="col-md-12">
                                            <input id="' . $i . '4" name="' . $i . '4" placeholder="Opção D" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br />
                                    <span style="color:white;"><b>Resposta correta</b>:</span><br />
                                    <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Resposta Certa" class="form-control input-md" >
                                    <option value="a">Selecione a resposta correta ' . '</option>
                                    <option value="a"> Opção A</option>
                                    <option value="b"> Opção B</option>
                                    <option value="c"> Opção C</option>
                                    <option value="d"> Opção D</option> </select><br /><br />';
                    }
                    echo '<div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12"> 
                                    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Criar Quiz" class="btn btn-primary"/>
                                </div>
                              </div>
                        </fieldset>
                        </form></div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>