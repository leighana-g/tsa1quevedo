<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Files\File;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        helper('form');
        return view('users/new');
    }

    public function create()
    {
        helper('form');
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
            'email'     => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return view('users/new', ['validation' => $this->validator]);
        }

        $model = new UserModel();
        $model->save([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        helper('form');
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $model = new UserModel();
        $user = $model->find($id);

        // Validate text fields AND the image file upload
        $rules = [
            'username'  => "required|is_unique[users.username,id,$id]",
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'avatar'    => 'max_size[avatar,2048]|is_image[avatar]|ext_in[avatar,png,jpg,jpeg]'
        ];

        if (!$this->validate($rules)) {
            $data['user'] = $user;
            $data['validation'] = $this->validator;
            return view('users/edit', $data);
        }

        $updateData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ];

        // Process the avatar file upload
        $avatar = $this->request->getFile('avatar');
        if ($avatar->isValid() && !$avatar->hasMoved()) {
            $newName = $avatar->getRandomName();
            $avatar->move(FCPATH . 'uploads', $newName);

            // Use CodeIgniter Image Service to create a display-ready thumbnail
            \Config\Services::image()
                ->withFile(FCPATH . 'uploads/' . $newName)
                ->fit(150, 150, 'center')
                ->save(FCPATH . 'uploads/' . $newName);

            $updateData['avatar'] = $newName;
        }

        $model->update($id, $updateData);
        return redirect()->to('/users');
    }
}