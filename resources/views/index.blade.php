
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>QUBeditotron3000</title>

        <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css" integrity="sha512-PlmS4kms+fh6ewjUlXryYw0t4gfyUBrab9UB0vqOojV26QKvUT9FqBJTRReoIZ7fO8p0W/U9WFSI4MAdI1Zm+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h2>QUBeditotron3000</h2>
          <p class="lead">The QUBeditoron3000 (the editor) is the world’s most over-engineered yet deeply unreliable text editor.</p>
        </div>
    
        <div class="row g-5">
          <div class="col-md-12 col-lg-12">
              <div class="row g-3">
                <div class="col-12">
                  <label for="content" class="form-label">Text content</label>
                  <textarea class="form-control" rows="5" cols="40" id="content">It was the best of cloud, it was the worst of cloud...</textarea>
                  <br>
                  <input class="form-control" type="text" id="output" readonly="1" value="" />
                </div>
                <div class="col-md-5">
                    <label for="function" class="form-label">Select the function</label>
                    <select class="form-control" id="function">
                        <option>Select function</option>
                        <option value="wordcount">Word Count</option>
                        <option value="charcount">Character Count</option>
                        <option value="commacount">Comma Count</option>
                        <option value="palindrome">Palindrome Count</option>
                        <option value="spacecount">Space Count</option>
                        <option value="countingvowels">Vowels Count</option>
                    </select>
                </div>
    
                <div class="col-md-4 wordcount" style="display: none;">
                  <label for="wordcount" class="form-label">Wordcount</label>
                   <select class="form-control" id="wordcount">
                        <option>Select text</option>
                        @foreach($logs->where('function', 'wordcount') as $value)
                            <option value="{{ $value->text }}">{{ $value->text }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 charcount" style="display: none;">
                  <label for="charcount" class="form-label">Character count</label>
                  <select class="form-control" id="charcount">
                    <option>Select text</option>
                    @foreach($logs->where('function', 'charcount') as $value)
                        <option value="{{ $value->text }}">{{ $value->text }}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-4 commacount" style="display: none;">
                      <label for="commacount" class="form-label">Comma Count</label>
                      <select class="form-control" id="commacount">
                        <option>Select text</option>
                        @foreach($logs->where('function', 'commacount') as $value)
                            <option value="{{ $value->text }}">{{ $value->text }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="col-md-4 palindrome" style="display: none;">
                          <label for="palindrome" class="form-label">Palindrome Count</label>
                          <select class="form-control" id="palindrome">
                            <option>Select text</option>
                            @foreach($logs->where('function', 'palindrome') as $value)
                                <option value="{{ $value->text }}">{{ $value->text }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 spacecount" style="display: none;">
                          <label for="spacecount" class="form-label">Space Count</label>
                          <select class="form-control" id="spacecount">
                            <option>Select text</option>
                            @foreach($logs->where('function', 'spacecount') as $value)
                                <option value="{{ $value->text }}">{{ $value->text }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 countingvowels" style="display: none;">
                          <label for="countingvowels" class="form-label">Vowels Count</label>
                          <select class="form-control" id="countingvowels">
                            <option>Select text</option>
                            @foreach($logs->where('function', 'countingvowels') as $value)
                                <option value="{{ $value->text }}">{{ $value->text }}</option>
                            @endforeach
                        </select>
                    </div>
              </div>
              <hr class="my-4">
              <div class="row g-6">
                <div class="col-md-2">
                    <button class="w-100 btn btn-primary btn-lg" id="wordcount-button">Word Count</button>
                </div>
                <div class="col-md-2">
                    <button class="w-100 btn btn-primary btn-lg" id="charcount-button">Character Count</button>
                </div>
                <div class="col-md-2">
                    <button class="w-100 btn btn-primary btn-lg" id="commacount-button">Comma Count</button>
                </div>
                <div class="col-md-2">
                    <button class="w-100 btn btn-primary btn-lg" id="palindrome-button">Palindrome Count</button>
                </div>
                <div class="col-md-2">
                    <button class="w-100 btn btn-primary btn-lg" id="spacecount-button">Space Count</button>
                </div>
                <div class="col-md-2">
                    <button class="w-100 btn btn-primary btn-lg" id="countingvowels-button">Vowels Count</button>
                </div>
              </div>
          </div>
        </div>
      </main>
    </div>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

        let URL = "http://proxy.40283254.qpc.hal.davecutting.uk/proxy";
        $( "#function" ).change(function() {
          $('.wordcount, .countingvowels, .spacecount, .palindrome, .charcount, .commacount').hide();
          if($('.' +this.value).is(":hidden")){
            $('.' + this.value).show();   
          }
        });
        $( "#wordcount" ).change(function() {
            $('#content').val(this.value);
        });
        $( "#palindrome" ).change(function() {
            $('#content').val(this.value);
        });
        $( "#countingvowels" ).change(function() {
            $('#content').val(this.value);
        });
        $( "#spacecount" ).change(function() {
            $('#content').val(this.value);
        });
        $( "#charcount" ).change(function() {
            $('#content').val(this.value);
        });
        $( "#commacount" ).change(function() {
            $('#content').val(this.value);
        });
        
        $("#countingvowels-button").click(function(){
            document.getElementById('output').value= null;
            $.ajax(URL+"/?func=countingvowels&text=" + document.getElementById('content').value)
              .done(function(result) {
                if(result.error == true){
                    $.notify(result.message, "warn");
                }
                if(result.error == false){
                    document.getElementById('output').value = result.count;
                    $.notify(result.message, "success");
                }
              })
              .fail(function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $.notify(err.message, "error");
              });
        });
        $("#spacecount-button").click(function(){
            document.getElementById('output').value= null;
            $.ajax(URL+"/?func=spacecount&text=" + document.getElementById('content').value)
              .done(function(result) {
                if(result.error == true){
                    $.notify(result.message, "warn");
                }
                if(result.error == false || result.error == "false"){
                    document.getElementById('output').value = result.count;
                    if(result.message){
                        $.notify(result.message, "success");
                    }
                    
                }
              })
              .fail(function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $.notify(err.message, "error");
              });
        });
        $("#palindrome-button").click(function(){
            document.getElementById('output').value= null;
            $.ajax(URL+"/?func=palindrome&text=" + document.getElementById('content').value)
              .done(function(result) {
                if(result.error == true){
                    $.notify(result.message, "warn");
                }
                if(result.error == false){
                    document.getElementById('output').value = result.count;
                    $.notify(result.message, "success");
                }
              })
              .fail(function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $.notify(err.message, "error");
              });
        });
        $("#commacount-button").click(function(){
            document.getElementById('output').value= null;
            $.ajax(URL+"/?func=commacount&text=" + document.getElementById('content').value)
              .done(function(result) {
                if(result.error == true){
                    $.notify(result.message, "warn");
                }
                if(result.error == false){
                    document.getElementById('output').value = result.answer;
                }
              })
              .fail(function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $.notify(err.message, "error");
              });
        });
        $("#charcount-button").click(function(){
            document.getElementById('output').value= null;
            $.ajax(URL+"/?func=charcount&text=" + document.getElementById('content').value)
              .done(function(result) {
                if(result.error == true){
                    $.notify(result.message, "warn");
                }
                if(result.error == false){
                    document.getElementById('output').value = result.answer;
                }
              })
              .fail(function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $.notify(err.message, "error");
              });
        });
        $("#wordcount-button").click(function(){
            document.getElementById('output').value= null;
            $.ajax(URL+"/?func=wordcount&text=" + document.getElementById('content').value)
              .done(function(result) {
                if(result.error == true){
                    $.notify(result.message, "warn");
                }
                if(result.error == false){
                    document.getElementById('output').value = result.answer;
                }
              })
              .fail(function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                $.notify(err.message, "error");
              });
        });
    </script>
  </body>
</html>