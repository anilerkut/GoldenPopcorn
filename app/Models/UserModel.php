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


}
