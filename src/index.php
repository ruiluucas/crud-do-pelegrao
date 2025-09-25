<?php
include('./app/services/produtoService.php');
include('./app/services/fornecedorService.php');

session_start();
$email = $_SESSION['email'];
if ((!isset($_SESSION['email']))) {
  unset($_SESSION['email']);
  header('location:login.php');
}

$fornecedorService = new FornecedorService();
$produtoService = new ProdutoService();
$produtos = $produtoService->getAll();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema de Gestão de Produtos</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
  <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-xl">
    <?php if (!empty($email)): ?>
      <p class="text-black text-right text-gray-600 mb-4"><span class="font-semibold"><?php echo htmlspecialchars($email); ?></span></p>
    <?php endif; ?>
    <h1 class="text-4xl font-bold text-center text-blue-700 mb-8">Sistema de Gestão de Produtos</h1>
    <div class="flex justify-between mb-6">
      <a href="adicionar/produto.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
        Adicionar Produto
      </a>
      <a href="adicionar/fornecedor.php" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition">
        Adicionar Fornecedor
      </a>
    </div>
    <div class="flex flex-col gap-4">
      <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
          <tr>
            <th></th>
            <th class="px-4 py-2 border-b text-left">Nome</th>
            <th class="px-4 py-2 border-b text-left">Fornecedor</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $key): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 border-b"><input onchange="saveRow(<? echo $key['id'] ?>)" type="checkbox" name="" id=""></td>
              <td class="px-4 py-2 border-b"><? echo $key['nome_produto'] ?></td>
              <td class="px-4 py-2 border-b"><? echo $key['nome_fornecedor'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <button onclick="" type="button">Adicionar na cesta</button>
    </div>
  </div>
</body>
<script>
  var values = []

  function saveRow(id) {
    if (values.includes(id)) {
      values.pop(id)
    } else {
      values.push(id)
    }
    console.log(values)
  }

  function handleCesta() {

  }
</script>

</html>