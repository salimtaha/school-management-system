<?php 
namespace App\Repository;

use App\Models\Question;
use App\Models\Quizze;

class QuestionRepository implements QuestionRepositoryInterface{

    public function index()
    {
        $questions = Question::select('id'  , 'title' , 'answers' , 'right_answer' , 'score' ,'quizz_id')->get();
        return view('pages.Questions.index' , compact('questions'));

    }
    public function create() 
    {
        $quizzes = Quizze::select( 'id', 'name')->get();
        return view('pages.Questions.create' , compact('quizzes'));
    }
    public function store($request)
    {

       
        try{

            Question::create([
                'title'        =>$request->input('title'),
                'answers'      =>$request->input('answers'),
                'right_answer' =>$request->input('right_answer'),
                'score'        =>$request->input('score'),
                'quizz_id'     =>$request->input('quizz_id'),

            ]);

            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' , $e->getMessage()]);
        }

    }
    public function edit($id)
    {
        $quizzes  =  Quizze::select('id' , 'name')->get();
        $question = Question::findOrFail($id);
        return view('pages.Questions.edit' , compact('question' , 'quizzes'));

    }
    public function update($request)
    {
        try{
            $question = Question::findOrFail($request->id);
            $question->update([
                'title'        =>$request->input('title'),
                'answers'      =>$request->input('answers'),
                'right_answer' =>$request->input('right_answer'),
                'score'        =>$request->input('score'),
                'quizz_id'     =>$request->input('quizze_id'),

            ]);

            return redirect()->route('questions.index');

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' , $e->getMessage()]);
        }

    }
    public function destroy($request)
    {
        Question::destroy($request->id);
        return redirect()->back();

    }
}