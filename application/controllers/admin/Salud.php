<?php defined('BASEPATH') or exit('No direct script access allowed');
class Salud extends MY_Controller
{
    public function __construct()
    {
        // var_dump('salud');
        // die;
        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

        $this->load->model('admin/admin_model', 'admin');
        $this->load->model('admin/salud_model', 'salud_model');
        $this->load->model('admin/activity_model', 'activity_model');
    }

    public function index()
    {
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/salud/salud_list');
        $this->load->view('admin/includes/_footer');
    }

    public function add()
    {

        $this->rbac->check_operation_access(); // check opration permission

        $data['admin_roles'] = $this->admin->get_admin_roles();


        if ($this->input->post('submit')) {
            // $this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|is_unique[ci_users.username]|required');
            // $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
            // 'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            
            $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
            $this->form_validation->set_rules('consejo_comunal', 'Consejo Comunal', 'trim|required');
            $this->form_validation->set_rules('cedula', 'Cédula', 'trim|required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required');
            $this->form_validation->set_rules('ocupacion', 'Ocupación', 'trim|required');
            $this->form_validation->set_rules('tipo_vivienda', 'Tipo Vivienda', 'trim|required');
            $this->form_validation->set_rules('zona_vivienda', 'Zona Vivienda', 'trim|required');
            $this->form_validation->set_rules('condicion_vivienda', 'Condición Vivienda', 'trim|required');
            $this->form_validation->set_rules('ingreso_familiar', 'Ingreso Familiar', 'trim|required');
            $this->form_validation->set_rules('enfermedad', 'Enfermedad', 'trim|required');
            $this->form_validation->set_rules('tratamiento', 'Tratamiento', 'trim|required');
            $this->form_validation->set_rules('alergico', 'Alergico', 'trim|required');
            $this->form_validation->set_rules('cual_alergia', 'Cual Alergia', 'trim');
            $this->form_validation->set_rules('vacuna_covid', 'Vacuna COVID-19', 'trim|required');
            $this->form_validation->set_rules('examen_laboratorio', 'Exámen Laboratorio', 'trim|required');
            $this->form_validation->set_rules('municipio', 'Municipio', 'trim|required');
            $this->form_validation->set_rules('comunidad', 'Comunidad', 'trim|required');
            $this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/salud/add'), 'refresh');
            } else {
                $data = array(
                    'added_by' => $this->session->userdata('user_id'),
                    'admin_role_id' => $this->input->post('role'),
                    'is_user' => 1, // if it is user then set 1 into DB
                    'nombres' => $this->input->post('nombres'),
                    'apellidos' => $this->input->post('apellidos'),
                    'consejo_comunal' => $this->input->post('consejo_comunal'),
                    'cedula' => $this->input->post('cedula'),
                    'telefono' => $this->input->post('telefono'),
                    'ocupacion' => $this->input->post('ocupacion'),
                    'tipo_vivienda' => $this->input->post('tipo_vivienda'),
                    'zona_vivienda' => $this->input->post('zona_vivienda'),
                    'condicion_vivienda' => $this->input->post('condicion_vivienda'),
                    'ingreso_familiar' => $this->input->post('ingreso_familiar'),
                    'enfermedad' => $this->input->post('enfermedad'),
                    'tratamiento' => $this->input->post('tratamiento'),
                    'alergico' => $this->input->post('alergico'),
                    'cual_alergia' => $this->input->post('cual_alergia'),
                    'vacuna_covid' => $this->input->post('vacuna_covid'),
                    'examen_laboratorio' => $this->input->post('examen_laboratorio'),
                    'municipio' => $this->input->post('municipio'),
                    'comunidad' => $this->input->post('comunidad'),
                    'sexo' => $this->input->post('sexo'),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d : h:m:s'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->salud_model->add_salud($data);
                if ($result) {

                    // Activity Log 
                    $this->activity_model->add_log(1);

                    $this->session->set_flashdata('success', 'Registro añadido exitosamente');
                    redirect(base_url('admin/salud'));
                }
            }
        } else {
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/salud/salud_add', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    public function edit($id = 0)
    {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
            $this->form_validation->set_rules('consejo_comunal', 'Consejo Comunal', 'trim|required');
            $this->form_validation->set_rules('cedula', 'Cédula', 'trim|required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required');
            $this->form_validation->set_rules('ocupacion', 'Ocupación', 'trim|required');
            $this->form_validation->set_rules('tipo_vivienda', 'Tipo Vivienda', 'trim|required');
            $this->form_validation->set_rules('zona_vivienda', 'Zona Vivienda', 'trim|required');
            $this->form_validation->set_rules('condicion_vivienda', 'Condición Vivienda', 'trim|required');
            $this->form_validation->set_rules('ingreso_familiar', 'Ingreso Familiar', 'trim|required');
            $this->form_validation->set_rules('enfermedad', 'Enfermedad', 'trim|required');
            $this->form_validation->set_rules('tratamiento', 'Tratamiento', 'trim|required');
            $this->form_validation->set_rules('alergico', 'Alergico', 'trim|required');
            $this->form_validation->set_rules('cual_alergia', 'Cual Alergia', 'trim');
            $this->form_validation->set_rules('vacuna_covid', 'Vacuna COVID-19', 'trim|required');
            $this->form_validation->set_rules('examen_laboratorio', 'Exámen Laboratorio', 'trim|required');
            $this->form_validation->set_rules('municipio', 'Municipio', 'trim|required');
            $this->form_validation->set_rules('comunidad', 'Comunidad', 'trim|required');
            $this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/salud/salud_edit/' . $id), 'refresh');
            } else {
                $data = array(
                    'nombres' => $this->input->post('nombres'),
                    'apellidos' => $this->input->post('apellidos'),
                    'consejo_comunal' => $this->input->post('consejo_comunal'),
                    'cedula' => $this->input->post('cedula'),
                    'telefono' => $this->input->post('telefono'),
                    'ocupacion' => $this->input->post('ocupacion'),
                    'tipo_vivienda' => $this->input->post('tipo_vivienda'),
                    'zona_vivienda' => $this->input->post('zona_vivienda'),
                    'condicion_vivienda' => $this->input->post('condicion_vivienda'),
                    'ingreso_familiar' => $this->input->post('ingreso_familiar'),
                    'enfermedad' => $this->input->post('enfermedad'),
                    'tratamiento' => $this->input->post('tratamiento'),
                    'alergico' => $this->input->post('alergico'),
                    'cual_alergia' => $this->input->post('cual_alergia'),
                    'vacuna_covid' => $this->input->post('vacuna_covid'),
                    'examen_laboratorio' => $this->input->post('examen_laboratorio'),
                    'municipio' => $this->input->post('municipio'),
                    'comunidad' => $this->input->post('comunidad'),
                    'sexo' => $this->input->post('sexo'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                );
                
                $data = $this->security->xss_clean($data);
                $result = $this->salud_model->edit_salud($data, $id);
                if ($result) {

                    $this->session->set_flashdata('success', 'Actualizado correctamente!');
                    redirect(base_url('admin/salud'));
                }
            }
        } else {
            $data['salud'] = $this->salud_model->get_salud_by_id($id);

            // var_dump($data);
            // die;

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/salud/salud_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    public function list()
    {
        $records = $this->salud_model->get_salud();
        $data = array();
        $count = 0;
        foreach ($records['data']  as $row) {
            $data[] = array(
                ++$count,
                $row['cedula'],
                $row['nombres'],
                $row['apellidos'],
                $row['telefono'],
                $row['ocupacion'],
                $row['tipo_vivienda'],
                '<a title="Editar" class="update btn btn-sm btn-warning" href="' . base_url('admin/salud/edit/' . $row['salud_id']) . '"> <i class="fa fa-pencil-square-o"></i></a>'
            );
        }
        $records['data'] = $data;
        echo json_encode($records);
    }
}
