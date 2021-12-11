<?php 

namespace App\Models;
use App\Entities\UserEntity;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; //veritabanındaki tablo adı
    protected $primaryKey = 'id';  //o tablonun primary keyi

    // return type, crud islemleri icin gecerlidir, yani builder kullanarak yaptıgımız sorgularda gecerli degildir
    protected $returnType = UserEntity::class; //sonuçları hangi formatta alabileceğimiz değişken
    protected $useSoftDeletes =true;  //true yaparsak datayı silince veritabanında kalmaya devam eder false yaparsak gider.

    protected $allowedFields = ['user_firstname','user_lastname','user_email','user_password','user_gender','user_birthdate']; //buranın içine kullanıcıların kullanmasını istediğimiz dataları giricez.

    protected $useTimestamp= false;  //bunu true yaparsak güncelleme yaptığımızda updated_at sütunu oluşuyor. , Zaman birimleri kullanılsın mı?
    protected $createdFiled='created_at'; 
    protected $updatedField='updated_at';
    protected $deletedField='deleted_at';

    protected $skipValidation=false;    //Validasyonları atla , önemseme


}
