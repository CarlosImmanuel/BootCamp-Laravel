<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>

    <form action="/regist" method="POST">
    @csrf
    <label>First Name :</label> <br>
    <input type="text" name="fname"><br><br>

    <label>Last Name :</label> <br>
    <input type="text" name="lname"><br><br>

    <label>Gender :</label> <br>
    <input type="radio" name="gender" value="1">Male<br>
    <input type="radio" name="gender" value="2">Female<br>
    <input type="radio" name="gender" value="3">Other<br><br>

    <label>Nationality :</label> <br>
    <select name="Nationality">
        <option value="indonesian">Indonesian</option>
        <option value="america">America</option>
        <option value="Africa">Africa</option>
    </select><br><br>

    <label>Language Spoken :</label> <br>
    <input type="checkbox" name="language" value="1">Bahasa Indonesia<br>
    <input type="checkbox" name="language" value="2">English<br>
    <input type="checkbox" name="language" value="3">Other<br><br>


    <label>Bio :</label> <br>
    <textarea cols="30" rows="10"></textarea><br><br>

    <input type="submit" value="Sign Up">
    </form>
</body>
</html>
