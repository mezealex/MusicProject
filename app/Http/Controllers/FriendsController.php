<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class FriendsController extends Controller
{
    public function FriendsStore() {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friendCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $friends = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Friends.Index', ['friends' => $friends, 'friendCount' => $friendCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $friend= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('friendid')) ]);
        $Comments = $friend->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('friendid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/friends/".request('friendid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friend = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Friends.Details', [ "friend" => $friend]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friends = $collection->find();  
        return view('Admin.Friends.Index', ['friends' => $friends]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friend = $collection->find();
        return view('Admin.Friends.Create', [ "friends" => $friend ]);
    }

    public function Store() {
        $friend = [
            "Season" => request("Season"),
            "Episode_Title" => request("Episode_Title"),
            "Summary" => request("Summary"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $insertOneResult = $collection->insertOne($friend);
        return redirect("/admin/friends");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friend = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Friends.Edit', [ "friend" => $friend ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friend = [
            "Season" => request("Season"),
            "Episode_Title" => request("Episode_Title"),
            "Summary" => request("Summary"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("friendid"))
        ], [
            '$set' => $friend
        ]);
        return redirect('/admin/friends/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friend = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Friends.Delete', [ "friend" => $friend ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("friendid"))
        ]);
        return redirect('/admin/friends/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->DB_ESGARFIVE->Friends;
        $friend = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Friends.Details', [ "friend" => $friend ]);
    }

}