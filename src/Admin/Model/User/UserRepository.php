<?php

namespace App\Admin\Model\User;

use App\Engine\Model;

class UserRepository extends Model
{
    public function getUsers()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->getQuery();

        return $this->db->query($sql);
    }

    public function testChangeUser(): void
    {
        $user = new User(5);
        $user->setEmail('d@d.ru');
        $user->setRole('user');
        $user->save();
    }
}
