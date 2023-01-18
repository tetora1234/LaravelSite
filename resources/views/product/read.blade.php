<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" rel="stylesheet">
    <link href="{{ asset('/slick_custom/images/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/slick_custom/comi_style.css') }}" rel=" stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        /** 入力ここから **/
        var page = {{ substr_count($product->sampleimages, ',')+1 }}; //ページ数
        var imgtype = "png"; //画像の拡張子
        var title = "{{ $product->title }}"; //タイトル名
        var site = "{{ url()->previous() }}"; //サイトのURL
        var copy = "{{ $product->author }}"; //作者名
        var display = 1; //左ページ始まりは「0」、右ページ始まりは「1」
        /* *ここまで **/

        $(function() {
            $("title,h1").text(title);
            $(".o_button").attr("onClick", "location.href='" + site + "'");
            $(".copy").text(copy);
        });
    </script>
</head>

<body>
    <!--漫画表示ゾーンここから-->
    <div class="slider" dir="rtl">
        <div id="first_page"></div>
        <?php $sampleimages = $product->sampleimages;
            $sampleimages = explode (',', $sampleimages) ?>

        @foreach ($sampleimages as $sampleimage)
        <div class="c_i">
            <div><img data-lazy="{{ $sampleimage }}" src="{{ asset('/slick_custom/images/load.gif') }}"></div>
        </div>
        @endforeach

        <div id="last_page">
            <div class="last_page_in" dir="ltr">
                <div>
                    <!--最終ページフリー追加ゾーンここから-->



                    <!--最終ページフリー追加ゾーンここまで-->
                </div>
                <h1></h1>
                <small>Copyright &copy; <span class="copy"></span> All Rights Reserved</small>
                <!--最終ページにボタンを追加する場合は以下をコメントアウト解除して編集-->
                <!--
                <p>
                    <a class="button" href="#">次の話へ</a>
                    <a class="button" href="#">前の話へ</a>
                </p>
                -->
                <p>
                    <input type="button" value="もう一度読む" class="button b_button">
                    <input type="button" value="サイトへ戻る" class="button o_button orange">
                </p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="{{ $product->affiliateurl }}" class="btn btn-dark">購入する</a>
                </div>
            </div>
        </div>
    </div>
    <!--漫画表示ゾーンここまで-->

    <!--メニューここから-->
    <div class="menu_box">
        <div class="menu_button">menu</div>
        <div class="menu_show">
            <h1></h1>
            <small>Copyright &copy; <span class="copy"></span> All Rights Reserved</small>
            <!--メニューにボタンを追加する場合は以下をコメントアウト解除して編集-->
            <!--
            <p>
                <a class="button" href="#">次の話へ</a>
                <a class="button" href="#">前の話へ</a>
            </p>
            -->
            <p>
                <input type="button" value="操作ヘルプ" class="button p_button">
                <input type="button" value="全画面表示" class="button g_button sp_none">
                <input type="button" value="拡大モード" class="button z_button">
                <input type="button" value="サイトへ戻る" class="button o_button orange">
            </p>
            <div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>
            <div class="dots" dir="rtl"></div>
            <div class="menu_button close">close</div>
        </div>
    </div>
    <!--メニューここまで-->

    <!--操作ヘルプここから-->
    <div class="help">
        <div class="help_in">
            <div class="help_img"><img src="{{ asset('/slick_custom/images/help.png') }}" width="300"></div>
            <p>【画面操作】</p>
            <!--class="sp_none"でPC以外だと非表示・class="pc_none"でPCだと非表示-->
            <ul class="pc_none">
                <li>&#9312;中央ダブルタップ<span>……拡大モード</span></li>
                <li>&#9312;中央フリック<span>……次のページ・前のページ</span></li>
                <li>&#9313;両端タップ<span>……次のページ・前のページ</span></li>
                <li>&#9314;ページャータップ<span>……ページ移動</span></li>
            </ul>
            <ul class="sp_none">
                <li>&#9312;中央スライド<span>……次のページ・前のページ</span></li>
                <li>&#9313;両端クリック<span>……次のページ・前のページ</span></li>
                <li>&#9314;ページャークリック<span>……ページ移動</span></li>
            </ul>
            <p class="sp_none">【キーボード操作】</p>
            <ul class="sp_none">
                <li>←キー……次のページ</li>
                <li>→キー……前のページ</li>
                <li>↓キー……メニュー表示</li>
                <li>↑キー……拡大モード</li>
                <li>F11キー……全画面表示</li>
            </ul>
        </div>
    </div>
    <!--操作ヘルプここまで-->

    <!--初期表示ガイドここから-->
    <div class="guide">
        <div class="slide-arrow prev-arrow"><span></span></div>
        <div class="guide_yazirusi">
            <div class="icon"></div>
            <div class="text"></div>
        </div>
        <div class="guide_operation">
            <!--ガイド内容ここから-->
            <img src="{{ asset('/slick_custom/images/guide.png') }}" width="190"><br>
            横へ読みます
            <!--ガイド内容ここまで-->
        </div>
        <div class="slide-arrow next-arrow"><span></span></div>
    </div>
    <!--初期表示ガイドここまで-->

    <!--拡大モードここから-->
    <div class="zoomwrap"></div>
    <div class="zoom_reset z_button">
        <div class="zr_in">拡大モードを解除</div>
    </div>
    <!--拡大モードここまで-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ asset('/slick_custom/comic.js') }}"></script>
</body>

</html>