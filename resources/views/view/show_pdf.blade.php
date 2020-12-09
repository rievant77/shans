<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        #watermark {
            position: fixed;

            /**
                    Set a position in the page for your image
                    This should center it vertically
                **/
            bottom: 10cm;
            left: 5.5cm;

            /** Change image dimensions**/
            width: 8cm;
            height: 8cm;

            /** Your watermark should be behind every content**/
            z-index: -1000;
        }
    </style>

    <title>Rules Pdf | {{ Auth::user()->name }}</title>
</head>

<body>

    <div class="text-center">
        <div class="rounded mx-auto d-block">
            <small> Printed By {{ Auth::user()->name }} - {{ Auth::user()->email }} -
                {{ $time = \Carbon\Carbon::now()->translatedFormat('d/m/Y') }}</small>
        </div>
        <div class="row wrapper">
            <div class="col-sm-12 mt-3">

                {{-- Looping Image --}}
                @foreach (json_decode($pdfs->image) as $pic)
                <br><img src="{{ asset('/asset/img/'. $pic) }}" style="height:1200px; width:800px" /></br>
                @endforeach

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>
