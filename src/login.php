<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require('./app/services/pessoaService.php');

  session_start();

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $pessoaService = new PessoaService();

  $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

  $_SESSION['email'] = $email;

  $pessoaService->getById($email, $senhaHash);

  header('Location: index.php');

  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
  class="bg-neutral-900 flex h-screen w-screen justify-center items-center">
  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
    <div class="flex justify-center mb-6">
      <button class="px-4 py-2 font-semibold text-blue-500">Login</button>
    </div>
    <form class="space-y-4" method="post">
      <input
        type="email"
        placeholder="Email"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <input
        type="password"
        placeholder="Senha"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
        Entrar
      </button>
    </form>
  </div>
</body>

</html>