<?php
if (isset($_POST['text1']))
{

// Your ID and token
    $user_id = 'ad39faff';
    $user_key = '8cfd64f8-6064-48dc-a032-8da7eb60833c';

// The data to send to the API
    $postData = array(
        'user_id'   =>  $user_id ,
        'user_key'  =>  $user_key,
        'text1'     =>  $_POST['text1'],
        'text2'     =>  $_POST['text2']
    );

// Setup cURL
    $ch = curl_init('https://api.codeq.com/v1_text_similarity');
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

// Send the request
    $response = curl_exec($ch);

// Check for errors
    if($response === FALSE){
        die(curl_error($ch));
    }

// Decode the response
    $responseData = json_decode($response, TRUE);

// Close the cURL handler
    curl_close($ch);

// Print the date from the response

}
else{
}
?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vazir-font/30.1.0/font-face.css" integrity="sha512-ZHFuHiK3EA1uh2tx7nB0j9HyXR/IAFW24KVNFGjY8QIjtDKHmcowjUyObXF40wYrG25+kECHEbH8rL+HbvRwYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">

        <title>مقایسه ی دو رشته</title>
    </head>
    <body>

        <div class="container">
            <form action="" method="post">
                <h5 class="text-center">مقایسه ی دو رشته</h5>

                <label for="text_1">متن اول را وارد کنید : </label>
                <textarea name="text1" id="text_1" class="form-control" cols="30" rows="5" placeholder="متن اول را وارد نمایید ..." required></textarea>

                <label for="text_2">متن اول را وارد کنید : </label>
                <textarea name="text2" id="text_2" class="form-control" cols="30" rows="5" placeholder="متن دوم را وارد نمایید ..." required></textarea>

                <button id="" type="submit" class="btn btn-outline-dark">مقایسه ی دو رشته</button>

            </form>

            <div class="show_result">
                <?php
                if (isset($_POST['text1'])){
                    ?>
                    <div class="alert alert-info">
                        <span>نتیجه ی مقایسه ی دو رشته : </span>
                        <p><?php echo number_format($responseData['text_similarity_score'] , 2) ?></p>
                    </div>
                    <?php
                }
                ?>


            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script>

        </script>
    </body>
</html>