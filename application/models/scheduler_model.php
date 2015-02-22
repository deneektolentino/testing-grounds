<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scheduler_model extends CI_Model {
 
    public function __construct() {
        $this->load->database();
	}
    
    public function getById( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id', $id )->limit( 1 )->get( 'appointments' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    } //end getById
    
    public function getAll($table) {
        //get all records from users table  

		if($table == 'rooms'){
			$this->db->select('*'); // <-- There is never any reason to write this line!
			$this->db->from('room_tbl');
			$this->db->join('bldg_tbl', 'room_tbl.Bldg = bldg_tbl.Bldg_id');
		}
		//console.log($table);
		if($table == 'buildings'){
			$this->db->select('*'); // <-- There is never any reason to write this line!
			$this->db->from('bldg_tbl');
		}
		
		$query = $this->db->get();

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
    public function update() {
        $data = array(
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'date' => $this->input->post('date', true),
            'time' => $this->input->post('time', true),
            'timeslot' => date( 'A', strtotime($this->input->post('time', true) ) ), //convert time to AM/PM
            'duration' => $this->input->post('duration', true), 
            'color_hex' => $this->input->post('color_hex', true)
        );
        
        $this->db->update( 'appointments', $data, array( 'id' => $this->input->post( 'id', true ) ) );
    } //end update
    
    public function delete( $id ) {
        $id = intval( $id );
        
        $this->db->delete( 'appointments', array( 'id' => $id ) );
    } //end delete
    
    public function create() {
        $data = array(
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'date' => $this->input->post('date', true),
            'time' => $this->input->post('time', true),
            'timeslot' => date( 'A', strtotime($this->input->post('time', true) ) ), //convert time to AM/PM
            'duration' => $this->input->post('duration', true), 
            'color_hex' => $this->input->post('color_hex', true)
        );
 
        $this->db->insert( 'appointments', $data );
    }

}

/* End of file scheduler_model.php */
/* Location: ./application/model/scheduler_model.php */