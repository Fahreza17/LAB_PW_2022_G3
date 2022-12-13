<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Member;
 
class MemberController extends Controller
{
    public function index(){
        return view('show');
    }
     
    public function getMembers(){
        $members = Member::latest()->paginate(20);
  
        return view('memberlist', compact('members'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
     
    public function save(Request $request){
        if ($request->ajax()){
            // Create New Member
            $member = new Member;
            $member->firstname = $request->input('firstname');
            $member->lastname = $request->input('lastname');
            // Save Member
            $member->save();
             
            return response($member);
        }
    }
     
    public function delete(Request $request){
        if ($request->ajax()){
            Member::destroy($request->id);
        }
    }
 
    public function update(Request $request){
        if ($request->ajax()){
            $member = Member::find($request->id);
            $member->firstname = $request->input('firstname');
            $member->lastname = $request->input('lastname');
 
            $member->update();
            return response($member);
        }
    }
}