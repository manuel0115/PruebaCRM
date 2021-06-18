<?php 
class TipoCliente_model extends CI_Model {

    

    public function getTipoClienteModel()
    {       
            

            $this->db->select("TC.ID AS ID,TC.NOMBRE AS NOMBRE");
            $this->db->from('TIPO_CLIENTE AS TC');
            $this->db->where('ESTADO =','1');
            $query=$this->db->get();
            

            return $query->result();




    }

   
}



?>