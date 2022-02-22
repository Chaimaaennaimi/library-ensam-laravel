<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <div class="book" style="background-color: red; width: 200px; height: 300px;">
<img src="data:image/jpg;bas64,{{ chunk_split(base64_encode($book->book_image)) }}" alt="">
    </div>

</body>
</html>
