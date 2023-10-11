<?php echo form_open_multipart('atracao/edit/'.$atracao['id_atracao'], array("class" => "form-horizontal")); ?>
    <div class="form-group">
        <label for="nome_atracao" class="col-md-4 control-label">Nome Atração</label>
        <div class="col-md-4">
            <input type="text" name="nome_atracao" value="<?php echo ($this->input->post('nome_atracao') ? $this->input->post('nome_atracao') : $atracao['nome_atracao']); ?>" class="form-control" id="nome_atracao" />
        </div>
    </div>
    <div class="form-group">
        <label for="data" class="col-md-4 control-label">Data da Atração</label>
        <div class="col-md-4">
            <input type="text" name="data" value="<?php echo ($this->input->post('data') ? $this->input->post('data') : $atracao['data']); ?>" class="form-control" id="data" />
        </div>
    </div>
    <div class="form-group">
        <label for="descricao" class="col-md-4 control-label">Descrição</label>
        <div class="col-md-4">
            <input type="text" name="descricao" value="<?php echo ($this->input->post('descricao') ? $this->input->post('descricao') : $atracao['descricao']); ?>" class="form-control descricao" id="descricao" />
        </div>
    </div>
    <div class="form-group">
        <label for="current_flyer" class="col-md-4 control-label">Flyer Atual</label>
        <div class="col-md-4">
            <img src="<?php echo base_url('uploads/'.$atracao['flyer']); ?>" alt="Flyer Atual" style="max-width: 200px;" />
            <input type="hidden" name="current_flyer" value="<?php echo $atracao['flyer']; ?>" />
        </div>
    </div>
	<div class="form-group">
		<label for="new_flyer" class="col-md-4 control-label">Novo Flyer</label>
		<div class="col-md-4">
		    <input type="file" name="new_flyer" class="form-control flyer" id="new_flyer" />
		</div>
	</div>
    
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-success">Save</button>
            <?php echo anchor('atracao/index', 'Voltar', ['class' => 'btn btn-info']); ?>
        </div>
    </div>
    
<?php echo form_close(); ?>
