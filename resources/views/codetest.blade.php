<!DOCTYPE html>
<html lang="en">    

<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Code Test</h1>
    <form action="{{route('sendEmail')}}" method="POST" accept="utf-8">
        {{csrf_field()}}
        <label for="email">Enter email address</label>
        <input type="text" name="emailAddress" id="email">
        <button type="submit" id="submit">send email to address</button>
    </form>
    <p></p>
</body>
</html>