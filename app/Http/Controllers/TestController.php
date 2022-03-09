<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if ($request->session()->has('admin')) {
            $validate = Validator::make($request->all(), [
               'question' => 'required|bail',
               'option1' => 'required|bail',
               'option2' => 'required|bail',
               'option3' => 'required|bail',
               'option4' => 'required|bail',
               'answer' => 'required|bail',
               'imageExists' => 'required|boolean'
            ]);
            if ($validate->fails()) {
               return [
                  'status' => 0,
                  'message' => $validate->errors()->first()
               ];
            }
               $test = Test::create($request->all());
               if ($test) {
                  return response()->json([
                     'status' => 1,
                     'message' => "Question saved successfully"
                  ]);
               }else{
                  return response()->json([
                     'status' => 0,
                     'message' => "Unable to save question"
                  ]);
               }
         }else{
            Redirect::route('admin');
         }
    }

    public function storeImage(Request $request)
    {
      //   if ($request->file('question')->isValid() && $request->file('option1')->isValid() )
      //   {
             $validate = Validator::make($request->all(), [
               'question' => 'required|bail|file',
               'option1' => 'required|bail|file',
               'option2' => 'required|bail|file',
               'option3' => 'required|bail|file',
               'option4' => 'required|bail|file',
               'answer' => 'required|bail|file'
               // 'imageExists' => 'required|boolean'
            ]);
            if ($validate->fails()) {
               return [
                  'status' => 0,
                  'message' => $validate->errors()->first()
               ];
            }
             $question = $request->question->store('documents');
             $option1 = $request->option1->store('documents');
             $option2 = $request->option2->store('documents');
             $option3 = $request->option3->store('documents');
             $answer = $request->answer->store('documents');
             $option4 = $request->option4->store('documents');

             $test = Test::create([
                'question' => $question,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'answer' => $answer,
                'imageExists' => true
             ]);
             if ($test) {
                return response()->json([
                   'status' => 1,
                   'message' => "Question saved successfully"
                ]);
             }else{
                return response()->json([
                   'status' => 0,
                   'message' => "Unable to save question"
                ]);
             }
      //   }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    public function StartTest()
    {
         $has_attempted = (Result::select('attempt')->where('email', Auth::user()->email)->first()->attempt ) ? 1 : null ;
         if ($has_attempted !== null) {
            return Inertia::render('Component/DoneTest');
         }else{
            return Inertia::render('Component/Test', [
                  'questions' => Test::inRandomOrder()->limit(5)->get()->map(function ($test) {
                      return [
                          'id' => $test->id,
                          'question' => $test->question,
                          'option1' => $test->option1,
                          'option2' => $test->option2,
                          'option3' => $test->option3,
                          'option4' => $test->option4,
                          'imageExists' => $test->imageExists,
                          'hidden' => true,
                          'chosen_option' => null
                      ];
                  }),
                  'time' => 40
              ]);
         }

    }

    public function getTestResult(Request $request)
    {
       $validation = Validator::make($request->all(), [
          'data' => 'required|json',
          'email' => 'required|email|exists:users,email|bail'
       ]);
       if ($validation->fails()) {
          return response()->json([
             'status' => 0,
             'message' => $validation->errors()->first()
          ]);
       }
       // Insert the score into the DB
       $result_exist = Result::select('attempt')->where('email', $request->email)->first();

       if ($result_exist !== null) {
          $score = $this->markTest($request->data);
          $percentage = $this->calculatePercentage($score, 4);
          if ($result_exist->attempt < 3) {
             $result_exist->score_2 = $score;
             $result_exist->percentage_2 = $percentage;
             $result_exist->attempt =+ 1;
             $result_exist->save();

             return response()->json([
               'status' => 1,
               'message' => "You have successfully taken PentadCrown test",
               'score' => $score,
               'percentage' => $percentage
            ]);
          }else{
             return response()->json([
               'status' => 0,
               'message' => "You have exhausted your attempts at taking test"
            ]);
          }
       }else{
          $score = $this->markTest($request->data);
          $percentage = $this->calculatePercentage($score, 4);
          Result::create([
             'email' => $request->email,
             'score_1' => $score,
             'percentage_1' => $percentage,
             'attempt' => 1
          ]);
          return response()->json([
             'status' => 1,
             'message' => "You have successfully taken PentadCrown test",
             'score' => $score,
             'percentage' => $percentage
          ]);
       }

    }
    protected function markTest(string $data)
    {
      $collectionOfTest = collect(json_decode($data));
      $getScore = $collectionOfTest->map(function($item){
          return [
             'mark' => (Test::select('answer')->where("id", $item->id)->first()->answer == $item->chosen_option) ? 1 : 0
          ];
       })->sum('mark');
       return $getScore;
    }

    protected function calculatePercentage(int $score, int $total)
    {
       return ($score/$total) * 100;
    }

    public function Administer()
    {
      return view('test');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
