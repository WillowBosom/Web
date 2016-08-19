<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC";
    // SQL para selecionar os registros
    $sql = "SELECT idFornecedor , nomeFornecedor , dataFundacao , email FROM fornecedores ORDER BY nomeFornecedor ASC";
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>   Fornecedores   </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/clientes.css" type="text/css" />
		<link rel="stylesheet" href="css/index.css" type="text/css" />
		<script type="text/javascript" src="../jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript" src="../jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </head>  
    <body>
    <div class="conteudo">
        <h1> Cadastro de Fornecedores </h1>
        <p><a class="btn btn-red" href="cadastrofornecedores.php"> Adicionar fornecedor </a>
           <a class="btn btn-red" href="../teste_05.php"> Gerar relatório </a>  </p>
        
        
        <h2>Lista de Fornecedores</h2>
        <p>Total de fornecedors:<?php echo $total ?></p>
        <?php if ($total > 0): ?>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th>Nomes</th>
                    <th>Email</th>
                    <th>Data Fundação</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fornecedor=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $fornecedor['nomeFornecedor'] ?></td>
                    <td><?php echo $fornecedor['email'] ?></td>
                    <td><?php echo dateConvert($fornecedor['dataFundacao'])  ?></td>
                    <td> 
                        <a href="form-edit-fornecedor.php?id=<?php echo $fornecedor['idFornecedor']?>"> Editar
                        </a>
                        <a href="deletefornecedor.php? id=<?php echo $fornecedor ['idFornecedor'] ?>"
                            onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p> Nenhum fornecedor registrado</p>
        <?php endif; ?>
   </div>
    </body>
</html>
