<!--
 5. Sukurkite forma, kuri leistų pridėti failą ir vėliau jį išsaugotų 
 serveryje su formoje nurodytu failo pavadinimu (name). (3 balai)

//    File forma: 
//    Name: [laboras.txt]
//    File: [browse]
-->


<html lang="">
<head>
    <style>
        body {
            margin: 10px;
            padding: 10px;
        }
        form input, form button{
            margin: 3px;
        }
    </style>

    <title></title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="filename" placeholder="Your filename"><br>
    <input type="file" name="my_file" placeholder="Upload file"><br>
    <button type="submit">Upload</button>
</form>

<?php
