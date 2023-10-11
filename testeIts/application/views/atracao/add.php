<?php echo form_open('atracao/add', array("class" => "form-horizontal", "enctype" => "multipart/form-data")); ?>
    <div class="form-group">
        <label for="nome_atracao" class="col-md-4 control-label">Nome Atração</label>
        <div class="col-md-4">
            <input type="text" name="nome_atracao" value="<?php echo $this->input->post('nome_atracao'); ?>" class="form-control" id="nome_atracao" />
        </div>
    </div>
    <div class="form-group">
        <label for="data" class="col-md-4 control-label">Data da Atração</label>
        <div class="col-md-4">
            <label for="datetime">Selecione uma data e hora:</label>
            <input id="date" name="data" type="datetime-local" id="datetime" value="<?php echo $this->input->post('data'); ?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label for="descricao" class="col-md-4 control-label">Descrição</label>
        <div class="col-md-4">
            <input type="text" name="descricao" value="<?php echo $this->input->post('descricao'); ?>" class="form-control descricao" id="descricao" />
        </div>
    </div>

    <div class="form-group">
        <label for="descricao" class="col-md-4 control-label">Flyer</label>
        <picture>
            <input name="flyer" type="file" id="fileInput">
        </picture>
        <img id="imagePreview" src="#" alt="Pré-visualização da Imagem" style="display: none; max-width: 100%; max-height: 200px;">
    </div>
    
    
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-success">Salvar</button>
            <?php echo anchor('atracao/index', 'Voltar', ['class' => 'btn btn-info']); ?>
        </div>
    </div>

    <script>
    // Variável para rastrear se o Swiper já foi iniciado
    var swiperIniciado = false;

    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';

                    if (!swiperIniciado) {
                        // Inicie o Swiper apenas se ainda não tiver sido iniciado
                        iniciarSwiper();
                        swiperIniciado = true;
                    }

                    // Envia a imagem para o upload.php para redimensionamento
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'upload.php', true);
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // A imagem redimensionada está disponível em xhr.responseText
                            // Você pode fazer algo com ela aqui, se necessário
                        }
                    };

                    const formData = new FormData();
                    formData.append('file', file);

                    xhr.send(formData);
                });

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    });

    // Função para iniciar o Swiper
    function iniciarSwiper() {
        const swiper = new Swiper('.swiper-programacao', {
            // Configurações do Swiper aqui
        });
    }
</script>


<?php echo form_close(); ?>