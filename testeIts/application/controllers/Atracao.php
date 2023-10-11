<?php
/** 
 * @see Instancia do objecto Atracao
 * @author Rafael G. Santos
 */
 
class Atracao extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Atracao_model');
    } 

    /**
     * @see Listing of atracoes
     */
    function index()
    {
        $data['atracoes'] = $this->Atracao_model->get_all_atracoes();
        
        $data['_view'] = 'atracao/index';
        $this->load->view('layouts/main',$data);
    }

    /**
     * @see Adding a new atracao
     */
    function add()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST')     
        {   
            $config['upload_path'] = FCPATH . 'uploads/'; // Caminho absoluto do diretório de upload

            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipos de arquivos permitidos
            $config['max_size'] = 2048; // Tamanho máximo do arquivo em kilobytes (2MB)
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('flyer')) {
                $upload_data = $this->upload->data();
                $flyer_filename = $upload_data['file_name'];

                $params = array(
                    'nome_atracao' => $this->input->post('nome_atracao'),
                    'data' => $this->input->post('data'),
                    'descricao' => $this->input->post('descricao'),
                    'flyer' => $flyer_filename, // Salve o nome do arquivo, não o objeto $_FILES
                );

                $atracao_id = $this->Atracao_model->add_atracao($params);
                redirect('atracao/index');
            } else {
                $error = $this->upload->display_errors();
                echo('Tamanho, formato de imagem não suportada ou falta de permissão para salvar a imagem na pasta uploads.');

                echo anchor('atracao/add', 'Adicionar uma nova atracao', ['class' => 'btn btn-primary']); 
            }
        }
        else
        {            
            $data['_view'] = 'atracao/add';
            $this->load->view('layouts/main', $data);
        }
    }
 

    /**
     * @see Editing a atracao
     */
    /**
 * @see Editing a atracao
 */
function edit($id_atracao)
{
    // Verifique se a atracao existe antes de tentar editá-la
    $data['atracao'] = $this->Atracao_model->get_atracao($id_atracao);

    if (isset($data['atracao']['id_atracao'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Configuração de upload de arquivo
            $config['upload_path'] = FCPATH . 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if (!empty($_FILES['new_flyer']['name'])) {
                // Um novo flyer foi enviado, então processe-o
                if ($this->upload->do_upload('new_flyer')) {
                    // O upload foi bem-sucedido, você pode obter o nome do novo flyer aqui
                    $upload_data = $this->upload->data();

                    $new_flyer_filename = $upload_data['file_name'];
                    // Atualize o nome do flyer no array $data['atracao']
                    $data['atracao']['flyer'] = $new_flyer_filename;
                } else {
                    // O upload falhou, trate o erro aqui, se necessário
                    $error = $this->upload->display_errors();
                    echo('tamanho de imagem não suportada');
                    // Exibir ou registrar o erro, se desejar
                }
            }

            // Agora você tem $data['atracao']['flyer'] atualizado com o novo nome do flyer, se aplicável

            // Atualize outros campos, se necessário
            $params = array(
                'nome_atracao' => $this->input->post('nome_atracao'),
                'data' => $this->input->post('data'),
                'descricao' => $this->input->post('descricao'),
                'flyer' => $data['atracao']['flyer'], // Certifique-se de que está usando o nome atualizado do flyer aqui
            );

            // Chame a função para atualizar a atracao
            $this->Atracao_model->update_atracao($id_atracao, $params);

            // Redirecione para a página de listagem de atracoes
            redirect('atracao/index');
        } else {
            // Exiba o formulário de edição
            $data['_view'] = 'atracao/edit';
            $this->load->view('layouts/main', $data);
        }
    } else {
        // A atracao que você está tentando editar não existe
        show_error('The atracao you are trying to edit does not exist.');
    }
}



    /**
     * @see Deleting atracao
     */
    function remove($id_atracao)
    {
        $atracao = $this->Atracao_model->get_atracao($id_atracao);

        // check if the atracao exists before trying to delete it
        if(isset($atracao['id_atracao']))
        {
            $this->Atracao_model->delete_atracao($id_atracao);
            redirect('atracao/index');
        }
        else
            show_error('The atracao you are trying to delete does not exist.');
    }
    
}