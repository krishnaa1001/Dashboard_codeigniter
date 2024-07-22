<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function dashboard()
    {
        $session = session();
        return view('dashboard', [
            'name' => $session->get('name'),
            'picture' => $session->get('picture'),
        ]);
    }

    public function profile()
    {
        $session = session();
        $model = new UserModel();
        $user = $model->find($session->get('id'));

        return view('profile', [
            'user' => $user,
        ]);
    }

    public function updateProfile()
    {
        $model = new UserModel();
        $session = session();

        $data = [
            'id' => $session->get('id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Handle file upload
        $img = $this->request->getFile('picture');
        if ($img->isValid() && !$img->hasMoved()) {
            $img->move(WRITEPATH . 'uploads');
            $data['picture'] = $img->getName();
        }

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $model->save($data);

        // Update session data
        $session->set([
            'name' => $data['name'],
            'email' => $data['email'],
            'picture' => isset($data['picture']) ? $data['picture'] : $session->get('picture'),
        ]);

        return redirect()->to('/profile');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
