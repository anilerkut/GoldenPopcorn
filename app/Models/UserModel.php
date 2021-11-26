<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; //veritabanındaki tablo adı
    protected $primaryKey = 'id';  //o tablonun primary keyi

    protected $returnType ='array'; //sonuçları hangi formatta alabileceğimiz değişken
    protected $useSoftDeletes =false;  //true yaparsak datayı silince veritabanında kalmaya devam eder false yaparsak gider.

    protected $allowedFields = ['user_firstname','user_lastname','user_email','user_password','user_gender','user_birthdate','updated_at']; //buranın içine kullanıcıların kullanmasını istediğimiz dataları giricez.

    protected $useTimestamp= true;  //bunu true yaparsak güncelleme yaptığımızda updated_at sütunu oluşuyor. , Zaman birimleri kullanılsın mı?
    protected $skipValidation=false;    //Validasyonları atla , önemseme
    protected $createdFiled='created_at'; 
    protected $updatedField ='updated_at';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert( array $data )
    {
        $data =$this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate( array $data )
    {
        $data =$this->passwordHash($data);

        return $data;
    }

    protected function passwordHash( array $data )
    {
        if(isset($data['data']['user_password']))
            $data['data']['user_password'] = password_hash( $data['data']['user_password'] , PASSWORD_DEFAULT);
        return $data;
    }
    

    [ 
        'user_firstname' => 
        [
           'required' => "First Name is required",
           'min_length' => "First Name must be at least 2 character" ,
           'alpha_space' => "First Name must contains only character or space"         
        ],
        'user_lastname' => 
        [
            'required' => "Last Name is required",
            'min_length' => "Last Name must be at least 2 character", 
           'alpha_space' => "Last Name must contains only character or space"   
        ],
        'user_email' => 
        [
            'required' => "Email is required", 
            'valid_email' => "Email must be valid",
            'is_unique' => "This email has been already taken"

        ],
        'password' => 
        [
            'required' => "Password is required",  
            'min_length' => "Password must be at least 4 character",   
            'max_length' => "Password must be less than 30 character" 
        ],
        'user_gender' => 
        [
            'required' => "Gender is required",  
        ],
        'user_age' => 
        [
            'required' => "Age is required",  
        ];
    ]; 
    */

    protected $skipValidation=false;    //Validasyonları atla , önemseme

}
