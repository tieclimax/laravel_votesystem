<?php

namespace App\Http\Controllers;

use App\Models\PointUsersSubjects;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    public function index(Request $request)
    {
        $getStudents = Student::all();
        $user_id = $request->get('user_id');
        // dd($user_id);
        // dd($getStudents);
        return view("step1", compact("getStudents", 'user_id'));
    }
    public function step1(Request $request)
    {
        $user_id = $request->get('user_id');
        $subjectId = "05506003";
        $stid = $request->get('vote');
        // dd($stid);
        $getVotescore = PointUsersSubjects::where("student_id", $stid)->where("subject_id", $subjectId)->first();
        // dd($getVotescore);
        $totalVotescore = $getVotescore->vote_score;
        $totalVotescore++;
        // dd($totalVotescore);
        $getStudents = Student::all();
        $updateVotescore = PointUsersSubjects::where('student_id', $stid)->where("subject_id", $subjectId)->update(['vote_score' => $totalVotescore]);
        // dd($updateVotescore);

        return view("step2", compact("getStudents", 'user_id'));
    }
    public function step2(Request $request)
    {
        $user_id = $request->get('user_id');
        // dd($user_id);
        $subjectId = "5506004";
        $stid = $request->get('vote');
        $getVotescore = PointUsersSubjects::where("student_id", $stid)->where("subject_id", $subjectId)->first();
        // dd($getVotescore);
        $totalVotescore = $getVotescore->vote_score;
        $totalVotescore++;
        // dd($totalVotescore);
        $getStudents = Student::all();
        $updateVotescore = PointUsersSubjects::where('student_id', $stid)->where("subject_id", $subjectId)->update(['vote_score' => $totalVotescore]);
        // dd($updateVotescore);
        return view("step3", compact("getStudents", 'user_id'));
    }
    public function step3(Request $request)
    {
        $user_id = $request->get('user_id');
        $subjectId = "5506006";
        $stid = $request->get('vote');
        $getVotescore = PointUsersSubjects::where("student_id", $stid)->where("subject_id", $subjectId)->first();
        // dd($getVotescore);
        $totalVotescore = $getVotescore->vote_score;
        $totalVotescore++;
        // dd($totalVotescore);
        $getStudents = Student::all();
        $updateVotescore = PointUsersSubjects::where('student_id', $stid)->where("subject_id", $subjectId)->update(['vote_score' => $totalVotescore]);
        // dd($updateVotescore);
        return view("step4", compact("getStudents", 'user_id'));
    }
    public function step4(Request $request)
    {

        $user_id = $request->get('user_id');
        $subjectId = "5506009";
        $stid = $request->get('vote');
        $getVotescore = PointUsersSubjects::where("student_id", $stid)->where("subject_id", $subjectId)->first();
        // dd($getVotescore);
        $totalVotescore = $getVotescore->vote_score;
        $totalVotescore++;
        // dd($totalVotescore);
        $getStudents = Student::all();
        $updateVotescore = PointUsersSubjects::where('student_id', $stid)->where("subject_id", $subjectId)->update(['vote_score' => $totalVotescore]);
        // dd($updateVotescore);
        return view("step5", compact("getStudents", 'user_id'));
    }
    public function step5(Request $request)
    {
        $user_id = $request->get('user_id');
        $subjectId = "5506209";
        $stid = $request->get('vote');
        $getVotescore = PointUsersSubjects::where("student_id", $stid)->where("subject_id", $subjectId)->first();
        // dd($getVotescore);
        $totalVotescore = $getVotescore->vote_score;
        $totalVotescore++;
        // dd($totalVotescore);
        $getStudents = Student::all();
        $updateVotescore = PointUsersSubjects::where('student_id', $stid)->where("subject_id", $subjectId)->update(['vote_score' => $totalVotescore]);
        $updateVotestatus = Student::where('id', $user_id)->update(['vote_status' => "voted"]);



        // dd($updateVotescore);
        return view("step6", compact("getStudents"));
    }
    public function showscores(Request $request)
    {

        $getsubjects = Subject::orderBy('id', 'DESC')->get();
        // dd($getsubjects);
        $subjects = '5506003';
        $allscores = PointUsersSubjects::where('subject_id', $subjects)->orderBy('point', 'DESC')->get();
        // dd($scores);

        // $data =  $getOwnsubjects->subjects()->name;
        // dd($data);
        return view('showscores', compact('allscores', 'getsubjects'));
    }
    public function selectSub(Request $request)
    {
        $subjects = $request->get('subject');
        // dd($subjects);
        $getsubjects = Subject::orderBy('id', 'DESC')->get();
        $showSub = Subject::where('id', $subjects)->first();
        // dd($showSub);
        $allscores = PointUsersSubjects::where('subject_id', $subjects)->orderBy('point', 'DESC')->get();

        $getstatus = Student::orderBy('vote_status', 'DESC')->get();
        $scores = PointUsersSubjects::where('subject_id', $subjects)->groupBy('vote_score')->count();
        // dd($scores);
        foreach ($getstatus as $item) {


            $vote_status = $item->vote_status;
            if ($vote_status == 'voting') {
                return view('showscores', compact('allscores', 'getsubjects'));
            }
            if ($scores == "2") {
                return view('showscores', compact('allscores', 'getsubjects', 'showSub'));
            } else {
                $subjects = $request->get('subject');
                $showSub = Subject::where('id', $subjects)->first();
                $scores = PointUsersSubjects::where('subject_id', $showSub->id)->orderBy('vote_score', 'DESC')->first();
                $scores->update(['point' => "0"]);
            }
        }
        return view('showscores', compact('allscores', 'getsubjects', 'showSub'));
    }
    public function setzero()
    {
        $getstatus = Student::orderBy('vote_status', 'DESC')->get();
        foreach ($getstatus as $item) {
            $vote_status = $item->vote_status;
            if ($vote_status == 'voting') {

                return "โหวตไม่ครบ";
            } else {
                $scores = PointUsersSubjects::where('subject_id', '')->orderBy('vote_score', 'DESC')->first();
                dd($scores);
                return "โหวตครบ";
            }
        }
    }
}
