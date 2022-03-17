<?php
namespace App\Interface;
interface ProjectRepositoryInterface 
{
    public function all();
    public function find($id);
    public function update($id,$data);
    public function delete($id);
    public function create($data);
}

?>