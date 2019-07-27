<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Crowd</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      </head>

       <body>
          <div class="container">
            <h1>Questions</h1><br>

            <ul class="list-group">
              @foreach ($questions as $question)
                  <li class="list-group-item">{{ $question->question }} <span class="badge badge-light">{{ $question->no }}</span><span class="badge">{{ $question->yes }}</span></li>
              @endforeach
            </ul>

            <div class="row">
              <div class="col-lg-12">
                <form method="POST" action="<?= url('/add-question') ?>">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="question" class="form-control" placeholder="Type a question...">
                    <span class="form-group-btn">
                      <button class="btn btn-default" type="submit">Add</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
         
       </body>
</html>
