<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Signin Template · Bootstrap v5.0</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css') ?>">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link href="<?= base_url('css/signin.css') ?>" rel="stylesheet">
</head>

<body class="text-center">
  <main class="form-signin">
    <?= form_open('login') ?>
    <img class="mb-4" src="<?= base_url('logo.jpg') ?>" alt="" width="100">
    <h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1>
    <?php if (isset($validation)) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>
    <label for="username" class="visually-hidden">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de Usuario" required autofocus>
    <label for="password" class="visually-hidden">Contraseña</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Enviar</button>
    <?= form_close() ?>
  </main>
</body>

</html>