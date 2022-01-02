<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\WatchlistModel;

class WatchlistController extends BaseController
{

    public function deleteUserMovie($userId, $movieId) {
        $watchlistModel = new WatchlistModel();
        $watchlistModel->deleteFromUserWatchlist($userId, $movieId);
        $data = [
            'status' => 'success',
            'message' => 'The movie has been removed from your watchlist!',
        ];
        // $userModel = new UserModel();
        return $this->response->setJSON($data);
        //return redirect()->to(base_url('profile/'.$userId));
    }

    public function addUserMovie($userId, $movieId) {
        $watchlistModel = new WatchlistModel();
        if ($watchlistModel->checkUserWatchlist($userId, $movieId) === null) {
            $newData = [
                'user_id' => $userId,
                'movie_id' => $movieId
            ];
            $watchlistModel->save($newData);
            $data['status'] = 'success';
            $data['message'] = 'Successfully added!';
            echo json_encode($data);
            //return redirect()->to(base_url('movie/'.$movieId));
        } else {
            // echo "ZATEN MEVCUT!";
            $data['status'] = 'error';
            $data['message'] = 'Already exists in your watchlist!';
            echo json_encode($data);
        }

    }

}