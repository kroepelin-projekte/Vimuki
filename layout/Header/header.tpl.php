<header class="container-fluid header">
    <div class="row">
        <div class="col-6">
            <div class="pt-2 logo">
                <img src="/images/logo.png">
            </div>
        </div>
        <div class="col-6">
            <?php

            $url = explode('/', $_SERVER['REQUEST_URI']);
            // Display countdown only in the page /room/{meetingId}
            if(count($url) === 3 && $url[1] === 'room'){
                $html = '<p class="text-right font-weight-bold time" id="time"></p>';
                $html .= '<p class="text-right" id="countdown"></p>';
                echo $html;
            }
            ?>
        </div>
    </div>
</header>
