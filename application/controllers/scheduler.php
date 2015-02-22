<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scheduler extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Scheduler_model');
    }
    
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    
	}
	public function rooms() {
        $this->load->view('templates/header');
		$this->load->view('Rooms_view');
        $this->load->view('templates/footer');
    
	}
	public function buildings() {
        $this->load->view('templates/header');
		$this->load->view('Buildings_view');
        $this->load->view('templates/footer');
    
	}
	public function schedules() {
        $this->load->view('templates/header');
		$this->load->view('Schedule_view');
        $this->load->view('templates/footer');
    
	}
	
	public function create() {
        if( !empty( $_POST ) ) {
            $this->Scheduler_model->create();
            echo 'New Appointment created successfully!';
        }
    }

    public function edit() {
		if( !empty( $_POST ) ) {
			$this->Scheduler_model->update();
			echo 'Appointment updated successfully!';
		}
	}
	
	public function delete($id = NULL) {
		if( is_null( $id ) ) {
				echo 'ERROR: Id not provided.';
				return;
			}

			$this->Scheduler_model->delete( $id );
			echo 'Appointment deleted successfully';
		}
		
	public function getById( $id ) {
        if( isset( $id ) )
            echo json_encode( $this->Scheduler_model->getById( $id ) );
		}

    public function read($table) {
        echo json_encode( $this->Scheduler_model->getAll($table) );
    }
}

/* End of file scheduler.php */
/* Location: ./application/controllers/scheduler.php */