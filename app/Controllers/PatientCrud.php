<?php 
namespace App\Controllers;
use App\Models\PatientModel;
use CodeIgniter\Controller;

class PatientCrud extends Controller
{

    // show patients list
    public function index(){
        $PatientModel = new PatientModel();
        $data['patients'] = $PatientModel->orderBy('ID', 'DESC')->findAll();
        return view('patient_view', $data);
    }

    // add patient form
    public function create(){
        return view('add_patient');
    }
 
    // insert data
    public function store() {
        $PatientModel = new PatientModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'medical_id'  => $this->request->getVar('medical_id'),
        ];
        $PatientModel->insert($data);
        return $this->response->redirect(site_url('/patients-list'));
    }

    // show & edit single patient
    public function singlePatient($ID = null){
        $PatientModel = new PatientModel();
        $data['patient_obj'] = $PatientModel->where('ID', $ID)->first();
        return view('edit_view', $data);
    }

    // update patient data
    public function update(){
        $PatientModel = new PatientModel();
        $ID = $this->request->getVar('ID');
        $data = [
            'name' => $this->request->getVar('name'),
            'medical_id'  => $this->request->getVar('medical_id'),
        ];
        $PatientModel->update($ID, $data);
        return $this->response->redirect(site_url('/patients-list'));
    }
 
    // delete user
    public function delete($ID = null){
        $PatientModel = new PatientModel();
        $data['patient'] = $PatientModel->where('ID', $ID)->delete($ID);
        return $this->response->redirect(site_url('/patients-list'));
    }  
    
    // AJAX operations 

    public function ajax_editable(){
        $PatientModel = new PatientModel();
        if ($this->request->isAJAX()) {
            $entity_id = $this->request->getPost('pk');
            $entity = $this->request->getPost('name');
            switch($entity)
            {
                case 'name':
                    $data = [
                        'name' => $this->request->getPost('value'),
                    ];
                break;

                case 'medical_id':
                    $data = [
                        'medical_id' => $this->request->getPost('value'),
                    ];
                break;
            }
            $update = $PatientModel->update($entity_id, $data);

            if($update){
                $data = [
                    'success' => true,
                    'id' => $entity_id,
                ];
                return $this->response->setJSON($data);
            } else {
                $this->response->setStatusCode(404, 'Nope. Not here.');
            }

        }
    }
}