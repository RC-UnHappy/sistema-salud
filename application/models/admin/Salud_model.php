<?php
class Salud_model extends CI_Model
{

    public function add_salud($data)
    {
        $this->db->insert('ci_salud', $data);
        return true;
    }

    public function get_salud()
    {

        $wh = array();

        $query = $this->db->get('ci_salud');
        $SQL = $this->db->last_query();

        if (count($wh) > 0) {
            $WHERE = implode(' and ', $wh);
            return $this->datatable->LoadJson($SQL, $WHERE);
        } else {
            return $this->datatable->LoadJson($SQL);
        }
    }


    //---------------------------------------------------
    // Get user detial by ID
    public function get_salud_by_id($id)
    {
        $query = $this->db->get_where('ci_salud', array('salud_id' => $id));
        return $result = $query->row_array();
    }

    //---------------------------------------------------
    // Edit user Record
    public function edit_salud($data, $id)
    {
        $this->db->where('salud_id', $id);
        $this->db->update('ci_salud', $data);
        return true;
    }

    //---------------------------------------------------
    // Change user status
    //-----------------------------------------------------
    function change_status()
    {
        $this->db->set('is_active', $this->input->post('status'));
        $this->db->where('user_id', $this->input->post('id'));
        $this->db->update('ci_users');
    }
}
