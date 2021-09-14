<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PostController extends ResourceController
{
    protected $modelName = 'App\Models\PostsModel';
    protected $format = 'json';
    public function __construct()
    {
        //
    }
    public function index()
    {
        $limit = $this->request->getGet('limit') ?? 5;
        $offset = $this->request->getGet('offset') ?? 0;
        return $this->respond([
            'posts'=>$this->model->findAll($limit, $offset),
            'total_count' => $this->model->countAll(),
        ]);
    }
    public function new()
    {
        echo "new";
    }
    public function create()
    {
        return $this->respond($this->request->getPost());
        $data = $this->request->getPost();
        return $this->respond($this->model->insert($data));
    }
    public function edit($id = null)
    {
        echo "Edit $id";
    }
    public function show($id = null)
    {
        return $this->respond($this->model->find($id));
    }
    public function update($id = null)
    {
        $data = $this->request->getJson();
        if (!$data = $this->model->update($id, $data)) {
            return $this->fail('Record Not Updated');
        }
        return $this->respondUpdated($data, 200, 'Record Updated Successfully!');
    }
    public function delete($id = null)
    {
        return $this->respond($this->model->delete($id));
    }
}
