<?php

namespace App\Models;

use CodeIgniter\Model;

class StudioModel extends Model
{
    protected $table = 'studio';
    public function getDataStudio(){
        return $this->orderBy('studioID', 'ASC')->findAll(1000);
    }
    public function deleteStudio($studioID)
    {
        return $this->db->table('studio')->where('studioID', $studioID)->delete();
    }
    public function findStudioByID($studioID) {
        return $this->db->table('studio')->where('studioID', $studioID)->get()->getRowArray();
    }
    protected $allowedFields = ['studioID', 'studioName', 'status', 'capacity', 'generated_seats']; // Fields that can be inserted/updated

    // Additional methods for retrieving, updating, deleting studios, etc.
}
