<?php

namespace App\Repositories;

use App\Models\User;



/**
 * Description of UserRepositories
 *
 * @author cecilia
 */

class UserRepository extends BaseRepository  
{
    public function getModel()
    {
        return new User();
    }
    
      protected function selectUsersList()
    {
        return $this->newQuery()->selectRaw(
            'users.* '
           
        );
    }
    
      public function paginateLista()
    {
        return $this->selectUsersList()
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }
    

    
    
}
