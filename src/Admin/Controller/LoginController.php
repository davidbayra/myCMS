<?php

namespace App\Admin\Controller;

use App\Engine\Controller;
use App\Engine\Core\Auth\Auth;
use App\Engine\Core\Database\QueryBuilder;
use App\Engine\DI\DI;

class LoginController extends Controller
{
    protected Auth $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() !== null) {
            header('Location: /');
            exit;
        }
    }

    public function loginAction(): void
    {
        $this->view->render('login');
    }

    public function authAdmin(): void
    {
        $params = $this->request->post;

        $queryBuilder = new QueryBuilder();
        $sql = $queryBuilder
            ->select()
            ->from('user')
            ->where('email', $params['email'])
            ->where('pass', md5($params['password']))
            ->limit(1)
            ->getQuery();

        $query = $this->db->query($sql, $queryBuilder->values);

        if (!empty($query)) {
            $user = $query[0];
            if ($user['role'] == 'admin') {
                $hash = md5($user['id'] . $user['name'] . $user['pass'] . $this->auth->salt());

                $sql = $queryBuilder
                    ->update('user')
                    ->set(['hash' => $hash])
                    ->where('id', $user['id'])
                    ->getQuery();

                $execute = $this->db->execute($sql, $queryBuilder->values);
                $this->auth->authorize($hash);

                setcookie('auth_user', $hash, time() + 157680000, '/');
                header('Location: /login');
                exit;
            }
        }

        echo 'Incorrect email or password';
    }

}
