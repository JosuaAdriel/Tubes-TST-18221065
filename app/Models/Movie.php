<?php
namespace App\Models;
use CodeIgniter\Model;
class Movie extends Model
{
    protected $table = 'Movie';
    public function getDataMovie(){
        return $this->orderBy('movieID', 'DESC')->findAll(1000);
    }
    public function deleteMovie($movieID)
    {
        return $this->db->table('Movie')->where('movieID', $movieID)->delete();
    }
    public function findMovieByID($movieID) {
        return $this->db->table('movie')->where('movieID', $movieID)->get()->getRowArray();
    }
    protected $allowedFields = ['movieID', 'title', 'synopsis', 'genre', 'durationInMins', 'director', 'cast', 'posterImg'];
}
