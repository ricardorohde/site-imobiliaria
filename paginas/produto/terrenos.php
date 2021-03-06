<div class="row">
<h1>Terrenos</h1><hr>
<?php 
	require_once("classes/Conexao.class.php");
	require_once("classes/Produto.class.php");
	
	$produto = new Produto();
	$produto->setTipo(3);
	if($produto->listaTipo()){
		$ap = $produto->listaTipo();
		foreach($ap as $i => $v){
			echo "<div class=\"col-sm-4 col-md-3\">
					<div class=\"thumbnail\">
					  <img src=\"imagens/terrenos/".$ap[$i]["imagem"]."\" alt=\"...\">
					  <div class=\"caption\">
						<h3>".$ap[$i]["nome"]."</h3>
						<ul class=\"list-group\">
						  <li class=\"list-group-item\">R$".number_format($ap[$i]["preco"], 2, ',', '.')."</li>
						</ul>
						<a href=\"?pg=verProduto&id=".$ap[$i]["id"]."\" class=\"btn btn-primary\">Ver Produto</a>
						<a class=\"btn btn-primary produto\" id=\"".$ap[$i]["id"]."\">Adicionar ao Carrinho</a>
						</div>
					</div>
				  </div>";
				  echo"<script>
				$(document).ready(function(){
					$(\"#".$ap[$i]["id"]."\").click(function(){
						$.ajax({
						  url: 'paginas/produto/adiciona-carrinho.php?id=".$ap[$i]["id"]."',
						  success: function(data) {
							$('#qtd-carrinho').text(data);
						  },
						  beforeSend: function(){
							$('.loader').css({display:\"block\"});
						  },
						  complete: function(){
							alert(\"produto inserido no carrinho\");
						  }
						});
					});
				});
			</script>";
		}
	}else{
		echo"não foi!";
	}
	
?>

</div>