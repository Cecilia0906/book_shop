<?php

namespace App\Models;
          

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Entity implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lastname','birthdate','gender','email', 'password','pais_id','provincia_id','ciudad_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
         public function scopeName($query,$name)
        {
           if(trim($name) != ""){
            $query->where('name',"LIKE","%$name%");
           }
        }
        
        public function scopeRole($query, $role){
            $roles = config('options.types');
            if($role!="" && isset($roles[$role])){
                $query->where('role','=',$role);
            }
            
        }
    
        public static function filterAndPaginate($name,$role){
            
            return User::name($name)->role($role)->orderBy('id','DESC')->paginate();
        }
        
        
        
        public function voted()
        {
            return $this->belongsToMany(Book::getClass(), 'book_votes')->withTimestamps();
        }
        
        public function hasVoted(Book $book)
       {
        return $this->voted()->where('book_id', $book->id)->count();
       }
}
