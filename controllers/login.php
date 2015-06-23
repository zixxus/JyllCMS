<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function _own() {
        $menu['nologged'] = array(
            'index', 'register', 'register_error', 'create', 'check_login'
        );
        $menu['user'] = array(
            'check_login', 'logout', 'index', 'index2'
        );
        $menu['moderator'] = array(
            'check_login', 'logout', 'index', 'index2'
        );
        $menu['admin'] = array(
            'check_login', 'logout', 'index', 'index2', 'user'
        );
        return $menu;
    }

    public function index() {

        Jyll_owner::redirect_own(Jyll_owner::check_own() != 'nologged', 'login/index2');
        View::render('login/index');
    }

    public function index2() {
        Controller::FrameworkExt("system_info");

        View::render('login/index2');
    }

    public function user($action, $value) {
        if (isset($action)) {
            if ($action == "edit") {
                if (isset($_POST['change'])) {
                    Jyll_form::required_form('login/user', array(
                        'email' => 'erroralert1',
                        'password' => 'erroralert2',
                        'name' => 'erroralert3',
                        'surname' => 'erroralert4',
                        'tel' => 'erroralert5',
                        'own' => 'erroralert6',
                        'active' => 'erroralert7',
                        'address' => 'erroralert8',
                    ));
                    
                    $this->model->edit_user($value);
                    View::redirectme('login/user');
                }
                $this->view->user = $this->model->getalluser($value);
                $this->view->render('login/user_edit');
            } else if ($action == "delete") {

                $t = $this->model->delete_users($value);

                View::redirectme('login/user');
            } else {

                Jyll::get_error(404);
            }
        } else {

            $this->view->user = $this->model->getalluser();
            $this->view->render('login/user');
        }
    }

    public function register() {

        Jyll_owner::must_ajax_render('login/register_ajax', 'login/register');
    }

    public function register_error() {

        $this->view->render('login/register');
    }

    public function create() {
        Jyll_form::required_form('login/register_error', array(
            'email' => array('name' => 'Email', 'system' => 'email'),
            'pass' => array(
                'name' => 'Haslo',
                'od' => '3',
                'do' => '50',
            ),
            'u_username' => array(
                'name' => 'Login',
                'od' => '3',
                'do' => '50',
            ),
            'regulamin' => 'Regulamin',
        ));

        $this->model->create();
        $this->redirect('login/index');
    }

    public function check_login() {
        Jyll_form::required_form('login/index', array(
            'login' => array('name' => 'Email(login)', 'system' => 'email'),
        ));

        $this->model->run();
        if (Session::get('userid') != null) {
            $this->redirect('login/index2');
        }
        //$this->redirect('dashboard');
    }

    public function logout() {

        Session::destroy();
        $this->redirect('homepage/index');
    }

}
