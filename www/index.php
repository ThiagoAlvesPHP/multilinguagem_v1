<?php declare(strict_types=1);

use Statickidz\GoogleTranslate;
use ThiagoAlvesPHP\Translator;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$lang = $_SESSION['lg'] ?? 'pt';
$messages = json_decode(file_get_contents(__DIR__ . "/../messages/$lang.json"), true, 512, JSON_THROW_ON_ERROR);

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $target = trim(filter_input(INPUT_POST, 'idioma'));
    $text = trim(filter_input(INPUT_POST, 'texto'));

    $translator = new Translator(new GoogleTranslate());
    $translation = $translator->translate($target, $text);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multilinguagem</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href=".." class="dropdown-toggle">
                        <b id="home"><?= $messages['home'] ?></b>
                    </a>
                </li>
                <li class="dropdown">
                    <a href=".." class="dropdown-toggle">
                        <b id="service"><?= $messages['service'] ?></b>
                    </a>
                </li>
                <li class="dropdown">
                    <a href=".." class="dropdown-toggle">
                        <b id="contact"><?= $messages['contact'] ?></b>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button style="color: #fff;" value="pt" class="btn btn-success value"
                            title="<?= $messages['pt'] ?>">Pt
                    </button>
                </li>
                <li>
                    <button style="color: #fff;" value="en" class="btn btn-danger value" title="<?= $messages['en'] ?>">
                        En
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="alert alert-info">
        <?= $messages[$lang] ?>
    </div>
    <hr>

    <?php if (isset($translation)): ?>
        <div class="row">
            <div class="col-sm-6">
                <h3>Original</h3>
                <p><?= htmlspecialchars($text) ?></p>
            </div>
            <div class="col-sm-6">
                <h3>Traduzido</h3>
                <p><?= htmlspecialchars($translation) ?></p>
            </div>
        </div>
        <hr>
    <?php endif ?>

    <form method="POST">
        <label>Traduzir para</label>
        <select class="form-control" required="" name="idioma">
            <option value="en">Inglês</option>
            <option value="pt">Português</option>
        </select>
        <label>Texto</label>
        <textarea class="form-control" name="texto" required=""></textarea>
        <br>
        <button class="btn btn-default">Traduzir</button>
    </form>
</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>



