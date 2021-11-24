<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;


class chatController extends Controller
{
    use GeneralTrait;
    // public $data;
    // public function __construct()
    // {
    //     $this->data = Auth::user()->id;
    // }
    public function index()
    {
        $id_chats = chat::distinct()->pluck('chatid');
        $data['lastChat'] = [];
        for($i=0;$i<count($id_chats);$i++){
            // ->where('from_user', Auth::user()->id)
           $chat = chat::where('chatid',$id_chats[$i])
           ->join('users as userTo','chats.to_user','userTo.id')
           ->join('users as userForm','chats.from_user','userForm.id')
           ->select('chats.*','userTo.username as user_to','userForm.username as user_form')->orderBy('chats.created_at','desc')->first();
           array_push($data['lastChat'] ,$chat);
        }
        // dd($data['lastChat']);
        return view('admin.chat.index')->with($data);
    }
    public function create()
    {
        // dd($this->data);
        $data['user'] = Auth::user()->id;
        return view('admin.chat.create')->with($data);
    }
    public function submit(Request $request)
    {
        $getUniqid = chat::where('from_user',Auth::user()->id)->where('to_user',$request->id)->first();
        $items = [4, 5, 6, 7];
        if($getUniqid == null) {
            $uniqid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $items[array_rand($items)]);
        } else {
            $uniqid=$getUniqid->chatid;
        }
        // dd($getUniqid->chatid);
        $request->validate([
            'id' => 'required|exists:users,id',
            'messageText' => 'required|string',
        ]);

        chat::create([
            'chatid' => $uniqid,
            'from_user' => Auth::user()->id,
            'to_user' =>  $request->id,
            'messageText' => $request->messageText,
        ]);
        $request->session()->flash('msg', 'Successed you send massage');
        return redirect('admin/chat');
    }
    public function message($id,$id_to,Request $request){
        
        $data['nameUser'] = User::where('id',$id_to)->select('username')->first();
        $data['idChat'] = chat::where('chatid',$id)->first();

        if($data['nameUser'] == null || $data['idChat'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        // dd($data['nameUser']);
        $data['messages'] = chat::where('chatid',$id)
        ->join('users as userTo','userTo.id','=','chats.to_user')
        ->join('users as userForm','userForm.id','=','chats.from_user')->select('chats.*','userForm.photo as photoFrom','userForm.username as useFrom'
        ,'userTo.photo as photoTo','userTo.username  as useTo')
        ->get();
        // dd($data['messages']);
        $data['id_chat'] = $id;
        $data['to_user']=$id_to;
        $request->session()->flash('prev', "message/$id/$id_to");
        return view('admin.chat.message')->with($data);
    }
    public function setMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'id_from' => 'required|exists:users,id',
            'id_to' => 'required|exists:users,id',
            'id_chat' => 'required|exists:chats,chatid',
            'msg' => 'required|string',
        ]);
      
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $arrMsg =[
            'chatid' => $request->id_chat,
            'from_user' =>$request->id_from,
            'to_user' => $request->id_to,
            'messageText' => $request->msg,
        ];
        chat::create($arrMsg);
        $chat = chat::get();
        return response()->json($arrMsg);

    }
}
