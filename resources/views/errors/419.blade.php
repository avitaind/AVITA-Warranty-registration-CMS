<!DOCTYPE html>
<html lang="en">

<head itemscope="">
    <title itemprop="name">404 error page option</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{ asset('assets/img/AVITA-logo.ico  ') }}" rel="shortcut icon" />
</head>
<style type="text/css">
    .clearfix:before,
    .clearfix:after {
        display: table;

        content: ' ';
    }

    .clearfix:after {
        clear: both;
    }

    body {
        background: #f0f0f0 !important;
    }

    .page-404 .outer {
        position: absolute;
        top: 0;

        display: table;

        width: 100%;
        height: 100%;
    }

    .page-404 .outer .middle {
        display: table-cell;

        vertical-align: middle;
    }

    .page-404 .outer .middle .inner {
        width: 300px;
        margin-right: auto;
        margin-left: auto;
    }

    .page-404 .outer .middle .inner .inner-circle {
        height: 300px;

        border-radius: 50%;
        background-color: #ffffff;
    }

    .page-404 .outer .middle .inner .inner-circle:hover i {
        color: #662D91 !important;
        background-color: #f5f5f5;
        box-shadow: 0 0 0 15px #662D91;
    }

    .page-404 .outer .middle .inner .inner-circle:hover span {
        color: #662D91;
    }

    .page-404 .outer .middle .inner .inner-circle i {
        font-size: 5em;
        line-height: 1em;

        float: right;

        width: 1.6em;
        height: 1.6em;
        margin-top: -.7em;
        margin-right: -.5em;
        padding: 20px;

        -webkit-transition: all .4s;
        transition: all .4s;
        text-align: center;

        color: #f5f5f5 !important;
        border-radius: 50%;
        background-color: #662D91;
        box-shadow: 0 0 0 15px #f0f0f0;
    }

    .page-404 .outer .middle .inner .inner-circle span {
        font-size: 11em;
        font-weight: 700;
        line-height: 1.2em;

        display: block;

        -webkit-transition: all .4s;
        transition: all .4s;
        text-align: center;

        color: #e0e0e0;
    }

    .page-404 .outer .middle .inner .inner-status {
        font-size: 20px;

        display: block;

        margin-top: 20px;
        margin-bottom: 5px;

        text-align: center;

        color: #662D91;
    }

    .page-404 .outer .middle .inner .inner-detail {
        line-height: 1.4em;

        display: block;

        margin-bottom: 10px;

        text-align: center;

        color: #999999;
    }

    .btn.btn-primary {
        color: #ffffff;
        background-color: #662D91;
    }

    .btn.btn-primary:hover,
    .btn.btn-outline-primary:hover {
        color: #662D91;
        background-color: #ffffff;
        border-color: #662D91;
    }

</style>

<body>
    <div id="snippetContent">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="page-404">
            <div class="outer">
                <div class="middle">
                    <div class="inner">
                        <div class="inner-circle"><i class="fa fa-home"></i><span>419</span></div> <span
                            class="inner-status">SORRY!</span> <span class="inner-detail"> Page Expired.
                                <br/>
                                <a href="{{ route('login') }}" class="btn btn-primary mtl"><i
                                    class="fa fa-home"></i>&nbsp;
                                Return home </a> </span>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript"></script>
    </div>
</body>

</html>
