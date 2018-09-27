<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resize Image</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css">

    <style>
        .d-none{
            display: none;
        }
        .input-photos{
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-align-content: flex-start;
            -ms-flex-line-pack: start;
            align-content: flex-start;
            -webkit-align-items: flex-start;
            -ms-flex-align: start;
            align-items: flex-start;
            padding:10px;


        }
        .input-photos > * {
            width:100px;
            height:100px;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: nowrap;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-content: center;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            border-radius: 20px;
            overflow: hidden;
            margin:10px;
            border: solid #eee 1px;
        }
        .input-photos > * img{
            max-width:100%;
        }
    </style>

</head>
<body>

<div class="container">

    <h1 class="mt-5 mb-5">Dosya Boyutlandır</h1>
    <form action="action.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="999999999999999999999">
        <div class="row ">

            <div class="col-sm-6 form-group">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label for="">Genişlik<small>(px)</small></label>
                        <input type="text" name="width" value="1000" class="form-control">

                    </div>
                    <div class="col-sm-3">
                        <label for="">Yükseklik<small>(px)</small></label>
                        <input type="text" name="height" value="1000" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label for="">Ölçeklendirme</label>
                        <select name="size" id="" class="form-control">
                            <option>cover</option>
                            <option>contain</option>
                            <option>aspect</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Kalite</label>
                        <input type="text" name="quality" class="form-control" value="100">
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="">İsim <small>(Ön ek)</small></label>
                            <input type="text" name="ek" class="form-control" value="images">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Şuradan Başlat</label>
                            <input type="text" name="start" class="form-control" value="1">
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label for="">Dosya seç : <small>(max:20 adet)</small></label>
                    <input type="file" name="images[]" onchange="img_pathUrl(this);" accept="image/jpeg" class="form-control" multiple>
                </div>

                <div class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Gönder">
                </div>

            </div>
            <div class="col-sm-6">
                <div class="input-photos"></div>
            </div>
        </div>


    </form>

</div>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<script>
    function img_pathUrl(input){
        if(input.files.length > 0)
        {
            $(".input-photos").html("");

            var i=0;
            $.each(input.files,function (e) {
                var src = (window.URL ? URL : webkitURL).createObjectURL(input.files[i]);
                $(".input-photos").append("<a href='"+src+"' data-fancybox='group'><img src="+src+" data-id="+i+"  /></a>");
                $(".input-photos").fadeIn();
                i++;
            });
        }
        else{
            $(".input-photos").html("").fadeOut();
        }
    }
</script>

</body>
</html>