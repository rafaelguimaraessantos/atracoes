<?php
/**
 * @see
 * @author
 */
class Atracao_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get atracao by id_atracao
     */
    function get_atracao($id_atracao)
    {
        return $this->db->get_where('atracoes',array('id_atracao'=>$id_atracao))->row_array();
    }
        
    /*
     * Get all atracoes
     */
    function get_all_atracoes()
    {
        $this->db->order_by('id_atracao', 'desc');
        return $this->db->get('atracoes')->result_array();
    }
        
    /*
     * function to add new atracao
     */
    function add_atracao($params)
    {
        // var_dump($params);
        // die;
        $this->db->insert('atracoes',$params);
        return $this->db->insert_id();
    }
        
    /*
     * function to update atracao
     */
    function update_atracao($id_atracao,$params)
    {
        $this->db->where('id_atracao',$id_atracao);

        return $this->db->update('atracoes',$params);
    }
    
    /*
     * function to delete atracao
     */
    function delete_atracao($id_atracao)
    {
        return $this->db->delete('atracoes',array('id_atracao'=>$id_atracao));
    }
}
