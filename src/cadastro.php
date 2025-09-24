<?php
require('./app/services/pessoaService.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $pessoaService = new PessoaService();

  $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

  $_SESSION['user'] = [
    'email' => $email,
  ];

  try {
    $pessoaService->create($email, $senhaHash);
    header('Location: index.php');
  } catch (Exception $e) {
    die("Erro ao cadastrar: " . $e->getMessage());
  }

  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
  class="bg-neutral-900 flex h-screen w-screen justify-center items-center">
  <div class="w-full mx-auto max-w-md bg-white rounded-lg shadow-md p-8">
    <div class="flex justify-center mb-6">
      <button class="px-4 py-2 font-semibold text-blue-500">Cadastro</button>
    </div>
    <form class="space-y-4" method="post" action="cadastro.php">
      <input
        type="email"
        placeholder="Email"
        name="email"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <input
        type="password"
        placeholder="Senha"
        name="senha"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
        Cadastrar
      </button>
    </form>
  </div>
</body>

</html>