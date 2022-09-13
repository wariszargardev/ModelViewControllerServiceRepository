<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laravel Google Translate - Webappfix!</title>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Laravel Google Translate Example</h1>
            <h5><a target="_blank" href="https://cloud.google.com/translate/docs/languages">Language support</a> </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <strong>Select Language</strong>
                </div>
                <div class="col-md-4">
                    <select class="form-select changeLanguage">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : ''}}>English</option>
                        <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : ''}}>Spanish</option>
                        <option value="pa" {{ session()->get('locale') == 'pa' ? 'selected' : ''}}>Punjabi</option>
                        <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : ''}}>Urdu</option>
                    </select>
                </div>
            </div>
            <h3>{{ GoogleTranslate::trans('Welcome To Google Translate',\App::getLocale()) }}</h3>
            <h3>{{ GoogleTranslate::trans('Hello World!',\App::getLocale()) }}</h3>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('.changeLanguage').change(function(event){
        var url = "{{ route('google.translate.change') }}";
        window.location.href = url+"?lang="+$(this).val()
    })
</script>
</body>
</html>
