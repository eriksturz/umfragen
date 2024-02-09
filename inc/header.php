<!DOCTYPE html>
<html lang="de">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- custom css -->
    <style>
        .heading-with-square {
            display: flex;
            align-items: center;
        }

        .square {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            width: 1em;
            height: 1em;
            flex-shrink: 0;
        }

        .square>span {
            font-size: 0.8em;
        }
    </style>
    <title>puudel</title>
</head>

<body>
    <!-- As a heading -->
    <header class="bg-light px-3 pt-4 pb-1">
        <div class="container text-center">
            <p>
        </p>
            <h1 class="mb-3 fw-bold">Puudel</h1>
        
        <div>
            <p>
              <a class="btn btn-outline-primary btn-sm" data-toggle="collapse" href="#infos" role="button" aria-expanded="false" aria-controls="infos">
                <i class="bi bi-arrows-angle-expand px-1"></i> Info 
              </a>
            </p>
            </div>
            <div class="collapse " id="infos">
              <div class="card card-body py-0 text-start">
                <p><h6 class="mb-0">Hinweise zur Anwendung:</h6>Diese Webapplikation zeigt exemplarisch die Interaktion zwischen Client und Server unter Einbeziehung einer MySQL-Datenbank.
                </p>
              </div>
              <p></p>
            </div>
        </div>
    </header>