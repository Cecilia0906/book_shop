<?php



namespace App\Repositories;

use App\Models\Author;

/**
 * Description of AuthorRepository
 *
 * @author cecilia
 */
class AuthorRepository extends BaseRepository {
     public function getModel()
    {
        return new Author();
    }
    
     protected function selectAuthorsList()
    {
        return $this->newQuery()->selectRaw(
            'authors.* ');
           
       
    }
    
    
     public function paginateLista()
    {
        return $this->selectAuthorsList()
            ->orderBy('id', 'ASC')
            ->paginate(6);
    }
    
    

}
