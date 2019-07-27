<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $questions = \App\Question::all();
    $vars = compact('questions');
    return view('welcome', $vars);
});

Route::post('/', function () {
    $jsonDataAsArray = request()->json()->all();
    $alexaRequest = \Alexa\Request\Request::fromData($jsonDataAsArray);
    if ($alexaRequest instanceof \Alexa\Request\IntentRequest) {
        switch ($alexaRequest->intentName) {
            case 'QuestionnaireResultIntent':
                $id = array_get($alexaRequest->slots, 'id');
                $question = \App\Question::find($id);
                $response = new \Alexa\Response\Response;
                $response->respond('The crowd said yes ' . $question->yes . ' times and no ' . $question->no . ' times.');
                return response()->json($response->render());
                break;
            case 'QuestionCreationIntent':
                $question = array_get($alexaRequest->slots, 'question');
                $response = new \Alexa\Response\Response;
                $record = new \App\Question;
                $record->question=$question;
                $record->save();
                $response->respond('The question has been added with ID ' . $record->id);
                return response()->json($response->render());
                break;
        }
    }
});

Route::post('/add-question', function () {
    $question = new \App\Question;
    $question->question=request()->input('question');
    $question->save();
    return redirect('/');
});
