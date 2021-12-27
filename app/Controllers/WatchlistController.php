<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\WatchlistModel;

class WatchlistController extends BaseController
{

    public function deleteUserMovie($userId, $movieId) {
        $watchlistModel = new WatchlistModel();
        $watchlistModel->deleteFromUserWatchlist($userId, $movieId);
        $userModel = new UserModel();
        return redirect()->to(base_url('profile/'.$userId));
    }

    public function addUserMovie($userId, $movieId) {
        $watchlistModel = new WatchlistModel();
        $newData = [
            'user_id' => $userId,
            'movie_id' => $movieId
        ];
        $watchlistModel->save($newData);
        return redirect()->to(base_url('movie/'.$movieId));
    }

}