 <table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>nome atração</th>
		<th>Data</th>
		<th>Descrição</th>
		<th>Flyer</th>
		<th>Ações</th>
    </tr>
	<?php foreach($atracoes as $e){ ?>
    <tr>
		<td><?php echo $e['id_atracao']; ?></td>
		<td><?php echo $e['nome_atracao']; ?></td>
		<td><?php echo $e['data']; ?></td>
		<td><?php echo $e['descricao']; ?></td>
		<td><?php echo $e['flyer']; ?></td>
		<td>
			
            <a href="<?php echo site_url('atracao/edit/'.$e['id_atracao']); ?>" class="btn btn-info btn-xs">Editar</a> 
            <a href="<?php echo site_url('atracao/remove/'.$e['id_atracao']); ?>" class="btn btn-danger btn-xs">Excluir</a>

        </td>

    </tr>

	<?php } ?>
</table>
<div class="text-center">
	  <a href="<?php echo site_url('atracao/add'); ?>" class="btn btn-success btn-lg">Adicionar uma nova atracao</a>
</div> 
