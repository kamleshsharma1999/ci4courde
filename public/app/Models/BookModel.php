<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table ='book';
    protected $allowedFields =['name','isbn_no','autbor'];
    
}
?>