<?php

namespace App\Models;

class Manual
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = Connection::getInstance()->getConnection();        
    }

    public function getAll()
    {
        $ssql = 'SELECT * FROM manuals';
        $result = $this->connection->query($ssql);
        return $result->fetchAll();
    }
    
    public function find($id) {
        $ssql = "SELECT * FROM manuals WHERE id=:id";
        $prepared = $this->connection->prepare($ssql);
        $prepared->execute([
          'id' => $id,
        ]);
        $result = $prepared->fetchAll();
        if(count($result) === 0) {
          return null;
        }
        return $result[0];
    }
  
    public function get($slug)
    {
        $ssql = 'SELECT * FROM manuals WHERE slug=:slug';
        $prepared = $this->connection->prepare($ssql);
        $prepared->execute([
            'slug' => $slug
        ]);
        $result = $prepared->fetchAll();
        if(count($result) === 0){
            return null;
        }
        return $result[0];
    }
    
    public function search ($query)
    {
        $ssql = "SELECT * FROM manuals WHERE "
                . " title LIKE :title OR"
                . " excerpt LIKE :excerpt";
        $prepared = $this->connection->prepare($ssql);
        $prepared->execute([
            'title' => "%$query%",
            'excerpt' => "%$query%"
        ]);
        return $prepared->fetchAll();
    }

    public function update($manual, $data)
    {
        $ssql = "UPDATE manuals SET title= :title, "
                . " manuals.order= :order "
                . " WHERE id=:id";
        $prepared = $this->connection->prepare($ssql);
        $isOk = $prepared->execute([
            'id' => $manual['id'],
            'title' => $data['title'],
            'order' => $data['order'],
            
        ]);
        return $isOk;
    }
}