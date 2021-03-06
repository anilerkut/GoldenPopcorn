<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; //veritabanındaki tablo adı
    protected $primaryKey = 'id';  //o tablonun primary keyi

    protected $returnType ='array'; //sonuçları hangi formatta alabileceğimiz değişken
    protected $useSoftDeletes =false;  //true yaparsak datayı silince veritabanında kalmaya devam eder false yaparsak gider.

    protected $allowedFields = ['user_firstname','user_lastname','user_email','user_type','user_password','user_gender',
        'user_birthdate', 'user_image', 'updated_at']; //buranın içine kullanıcıların kullanmasını istediğimiz dataları giricez.


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

    public function getUserMovies($id) {
        $builder = $this->builder($this->table);
        $builder = $builder->select('movie.movie_name, movie.movie_poster, movie.id');
        $builder = $builder->join('watchlist', 'watchlist.user_id = user.id');
        $builder = $builder->join('movie', 'movie.id = watchlist.movie_id');
        $builder = $builder->where('user.id',$id);
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function deleteFromWatchlist ($userId, $movieId) {

        $builder = $builder->join('watchlist', 'watchlist.user_id = user.id');
        $builder = $builder->join('movie', 'movie.id = watchlist.movie_id');
        $builder = $builder->where('watchlist.user_id',$userId);
        $builder = $builder->where('watchlist.movie_id',$movieId);
        $builder->delete();
    }

}
