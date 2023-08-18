<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table ='book';
    protected $allowedFields =['name','isbn_no','autbor'];
    public function getRecords(){
      return $this->orderBy('id','ASC')->findAll();

    }
    public function getRow($id){
    return $this->where('id',$id)->first();
    }

    
}
?>