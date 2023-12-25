<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->model('User_model');
        $this->LAVA = lava_instance();

    }

    public function index()
    {
        if (!$this->LAVA->is_logged_in()) {
            $this->session->set_flashdata('errors', ['Login First']);
            redirect('login');
            return;
        }

        $this->call->model('User_model');

        $data['students'] = $this->User_model->getUsers();

        $this->call->view('index', $data);
    }

    public function addnewstudent()
    {
        $this->call->model('User_model');
        $userId = $this->LAVA->session->userdata('user_id');
        $data['courses'] = $this->User_model->getCourses();
        $data['email'] = $this->LAVA->session->userdata('email');
        $data['student'] = $this->User_model->getStudentProfile($userId);
        if (is_bool($data['student'])) {
            $data['student'] = 'no user yet';
            $this->call->view('addstudent', $data);
        } else {
            $this->call->view('addstudent', $data);
        }


    }

    public function editstudent($id)
    {
        $this->call->model('User_model');
        $data['user'] = $this->User_model->getUserDataById($id);

        $data['courses'] = $this->User_model->getCourses();

        $this->call->view('editstudent', $data);
    }

    public function getCourse()
    {
        $this->call->model('User_model');

        $data['courses'] = $this->User_model->getCourses();

        $this->call->view('managestudent', $data);
    }

    public function student()
    {
        $userId = $this->LAVA->session->userdata('user_id');
        $data['student'] = $this->User_model->getStudentProfile($userId);

        $this->call->view('student', $data);
    }
    public function profile()
    {
        $userId = $this->LAVA->session->userdata('user_id');
        $data['student'] = $this->User_model->getStudentProfile($userId);
        $data['courses'] = $this->User_model->getCourses();


        $this->call->view('updateProfile', $data);
    }

    public function admin()
    {

        $this->call->model('User_model');
        $data['total_students'] = $this->User_model->getTotalStudents();
        $data['enrolled_students'] = $this->User_model->getEnrolledStudents();
        $data['pending_enrollees'] = $this->User_model->getPendingEnrollees();
        $data['dropped_students'] = $this->User_model->getDroppedStudents();

        $data['students'] = $this->User_model->getUsers();

        $this->call->view('index', $data);
    }

    public function managestudent()
    {
        $this->call->model('User_model');

        $data['students'] = $this->User_model->getUsers();

        $this->call->view('managestudent', $data);
    }

    public function enrollment()
    {
        $this->call->model('User_model');

        $data['enrolledStudents'] = $this->User_model->getEnrolledUsers();

        $this->call->view('enrollment', $data);
    }

    public function login()
    {
        $this->call->view('login');
    }

    public function loginAuth()
    {
        $email = $this->io->post('email');
        $password = $this->io->post('password');

        $user = $this->User_model->authenticateUser($email, $password);

        if ($user) {
            $this->LAVA->set_logged_in($user['user_id']);

            if ($user['role'] == 'admin') {
                redirect('admin');
            } else {
                redirect('addnewstudent');
            }
        } else {
            $this->session->set_flashdata('errors', ['Invalid email or password']);
            redirect('login');
        }
    }


    public function set_logged_in($user_id)
    {

        $user_data = $this->User_model->getUserDataById($user_id);


        if (!empty($user_data)) {

            $this->LAVA->session->set_userdata([
                'user_id' => $user_data['user_id'],
                'username' => $user_data['username'],
                'email' => $user_data['email'],
                'browser' => $_SERVER['HTTP_USER_AGENT'],
                'logged_in' => true
            ]);
        }
    }

    public function is_logged_in()
    {
        $isLogged = $this->LAVA->session->has_userdata('logged_in') && $this->LAVA->session->userdata('logged_in');
        return $isLogged;
    }

    public function logout()
    {
        $this->LAVA->session->sess_destroy();
        redirect('login');
    }

    public function register()
    {
        $this->call->view('register');
    }

    public function registerAuth()
    {


        $this->form_validation
            ->name('username')
            ->required()
            ->min_length(4)
            ->max_length(20)
            ->name('password')
            ->required()
            ->min_length(8)
            ->custom_pattern('^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$', 'make sure password passed all the requirements')
            ->name('confirm-password')
            ->matches('password', 'password doesnt match')
            ->required()
            ->min_length(8)
            ->name('email')
            ->required()
            ->valid_email();

        if ($this->form_validation->run() == false) {
            $_SESSION['errors'] = $this->form_validation->get_errors();
            $this->session->mark_as_flash('errors');

            redirect('register');
        } else {

            $data = [
                'username' => $this->io->post('username'),
                'email' => $this->io->post('email'),
                'password' => password_hash($this->io->post('password'), PASSWORD_BCRYPT),
            ];
            $this->User_model->register($data);
            $this->session->set_flashdata('success', 'Registration succesful. ');
            redirect('login');
        }
    }

    public function delete($data)
    {
        $this->User_model->delete($data);

        $usersData['students'] = $this->User_model->getUsers();
        redirect('managestudent', $usersData);
    }

    public function deleteagain($data)
    {
        $this->User_model->delete($data);

        $usersData['students'] = $this->User_model->getUsers();
        redirect('enrollment', $usersData);
    }

    public function update(
    ) {
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('student_id')
                ->required()
                ->name('first_name')
                ->required()
                ->name('last_name')
                ->required()
                ->name('course_id')
                ->required()
                ->name('year_level')
                ->required();

            if ($this->form_validation->run()) {
                $data = [
                    'student_id' => $this->io->post('student_id'),
                    'first_name' => $this->io->post('first_name'),
                    'last_name' => $this->io->post('last_name'),
                    'course_id' => $this->io->post('course_id'),
                    'year_level' => $this->io->post('year_level'),
                ];
                $id = $this->io->post('student_id');

                $this->User_model->update($data, $id);

                $usersData['students'] = $this->User_model->getUsers();
                redirect('managestudent', $usersData);
            } else {
                echo $this->form_validation->errors();
            }
        }
    }

    public function updateStatus($id)
    {
        $newData = [
            'status' => 'Enrolled',
        ];

        $usersData['students'] = $this->User_model->getUsers();

        $this->User_model->updateStatus($newData, $id);

        redirect('enrollment');
    }

    public function insert()
    {


        $user_id = $this->LAVA->session->userdata('user_id');


        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('first_name')
                ->required()
                ->name('last_name')
                ->required()
                ->name('course')
                ->required()
                ->name('email')
                ->valid_email()
                ->name('contact_number')
                ->required()
                ->name('birthday')
                ->required()
                ->name('address')
                ->required()
                ->name('year_level')
                ->required()
                ->name('section')
                ->required();

            if ($this->form_validation->run()) {
                $first_name = $this->io->post('first_name');
                $last_name = $this->io->post('last_name');
                $course = $this->io->post('course');
                $email = $this->io->post('email');
                $contact_number = $this->io->post('contact_number');
                $birthday = $this->io->post('birthday');
                $address = $this->io->post('address');
                $year_level = $this->io->post('year_level');
                $section = $this->io->post('section');

                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'course' => $course,
                    'email' => $email,
                    'contact_number' => $contact_number,
                    'birthday' => $birthday,
                    'address' => $address,
                    'year_level' => $year_level,
                    'section' => $section,
                    'user_id' => $user_id
                );

                $this->User_model->insert($first_name, $last_name, $course, $email, $contact_number, $birthday, $address, $year_level, $section, $user_id);

                redirect('addnewstudent');
            } else {
                echo $this->form_validation->errors();
            }
        }
    }
    public function updateProfile()
    {



        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('student_id')
                ->required()
                ->name('first_name')
                ->required()
                ->name('last_name')
                ->required()
                ->name('contact_number')
                ->required()
                ->name('birthday')
                ->required()
                ->name('address')
                ->required();

            if ($this->form_validation->run()) {
                $student_id = $this->io->post('student_id');
                $first_name = $this->io->post('first_name');
                $last_name = $this->io->post('last_name');


                $contact_number = $this->io->post('contact_number');
                $birthday = $this->io->post('birthday');
                $address = $this->io->post('address');



                $this->User_model->updateProfile($first_name, $last_name, $contact_number, $birthday, $address, $student_id);

                redirect('student');
            } else {
                echo $this->form_validation->errors();
            }
        }
    }

    public function search()
    {

        $searchTerm = $this->io->post('searchTerm');
        $data['total_students'] = $this->User_model->getTotalStudents();
        $data['enrolled_students'] = $this->User_model->getEnrolledStudents();
        $data['pending_enrollees'] = $this->User_model->getPendingEnrollees();
        $data['dropped_students'] = $this->User_model->getDroppedStudents();

        $data['students'] = $this->User_model->search($searchTerm);

        $this->call->view('index', $data);

    }

}
?>