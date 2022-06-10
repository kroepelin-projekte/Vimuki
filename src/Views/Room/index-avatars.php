<div class="container-fluid main-room-page-2">
    <div class="row">
        <div class="col-12">
            <div class="float-right countdown">
                <img src="/images/graphics/graphic_4.png">
                <span class="text-center" id="countdown"></span>
            </div>
            <input type="hidden" name="hidden-event-time" value="<?php echo $meeting['time'] ?>" id="hidden-event-time">
            <input type="hidden" name="hidden-event-date" value="<?php echo $meeting['date'] ?>" id="hidden-event-date">
        </div>
        <div class="col-12 col-md-4">
            <div class="graphic-5">
                <img src="/images/graphics/avatar-aussuchen.png">
                <span id="countdown"></span>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="container-first-panel-avatars" id="container-first-panel-avatars">
                <div class="row m-0">
                    <?php

                    $html = '';
                    for($i = 0; $i < 9; $i++){

                        $html .= '<div class="col-4 p-1 avatar">';
                        $html .= '<img onclick="openModalBoxAvatars()" src="'.$meeting['avatars'][$i]['url'].'" alt="'.$meeting['avatars'][$i]['alt'].'" id="avatar-'.$meeting['avatars'][$i]['key'].'" class="d-block ml-auto mr-auto img-avatar">';
                        $html .= '<input type="hidden" name="hidden-url-fullscreen-img" id="hidden-url-fullscreen-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['fullscreen-url'].'">';
                        $html .= '<input type="hidden" name="hidden-description" id="hidden-description-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['description'].'">';
                        $html .= '<input type="hidden" name="hidden-url-bbb-server-img" id="hidden-url-bbb-server-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['url-bbb-server'].'">';
                        $html .= '</div>';
                    }
                    echo $html;

                    ?>
                </div>
            </div>
            <div class="container-second-panel-avatars" id="container-second-panel-avatars">
                <div class="row m-0">
                    <?php

                    $html = '';
                    for($i = 9; $i < 18; $i++){

                        $html .= '<div class="col-4 p-1 avatar">';
                        $html .= '<img onclick="openModalBoxAvatars()" src="'.$meeting['avatars'][$i]['url'].'" alt="'.$meeting['avatars'][$i]['alt'].'" id="avatar-'.$meeting['avatars'][$i]['key'].'" class="d-block ml-auto mr-auto img-avatar">';
                        $html .= '<input type="hidden" name="hidden-url-fullscreen-img" id="hidden-url-fullscreen-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['fullscreen-url'].'">';
                        $html .= '<input type="hidden" name="hidden-description" id="hidden-description-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['description'].'">';
                        $html .= '<input type="hidden" name="hidden-url-bbb-server-img" id="hidden-url-bbb-server-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['url-bbb-server'].'">';
                        $html .= '</div>';
                    }
                    echo $html;

                    ?>
                </div>
            </div>
            <div class="container-third-panel-avatars" id="container-third-panel-avatars">
                <div class="row m-0">
                    <?php

                    $html = '';
                    for($i = 18; $i < 27; $i++){

                        $html .= '<div class="col-4 p-1 avatar">';
                        $html .= '<img onclick="openModalBoxAvatars()" src="' . $meeting['avatars'][$i]['url'] . '" alt="' . $meeting['avatars'][$i]['alt'] . '" id="avatar-' . $meeting['avatars'][$i]['key'] . '" class="d-block ml-auto mr-auto img-avatar">';
                        $html .= '<input type="hidden" name="hidden-url-fullscreen-img" id="hidden-url-fullscreen-img-' . $meeting['avatars'][$i]['key'] . '" value="' . $meeting['avatars'][$i]['fullscreen-url'] . '">';
                        $html .= '<input type="hidden" name="hidden-description" id="hidden-description-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['description'].'">';
                        $html .= '<input type="hidden" name="hidden-url-bbb-server-img" id="hidden-url-bbb-server-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['url-bbb-server'].'">';
                        $html .= '</div>';
                    }
                    echo $html;


                    ?>
                </div>
            </div>
            <div class="container-fourth-panel-avatars" id="container-fourth-panel-avatars">
                <div class="row m-0">
                    <?php

                    $html = '';
                    for($i = 27; $i < 33; $i++){

                        $html .= '<div class="col-4 p-1 avatar">';
                        $html .= '<img onclick="openModalBoxAvatars()" src="' . $meeting['avatars'][$i]['url'] . '" alt="' . $meeting['avatars'][$i]['alt'] . '" id="avatar-' . $meeting['avatars'][$i]['key'] . '" class="d-block ml-auto mr-auto img-avatar">';
                        $html .= '<input type="hidden" name="hidden-url-fullscreen-img" id="hidden-url-fullscreen-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['fullscreen-url'].'">';
                        $html .= '<input type="hidden" name="hidden-description" id="hidden-description-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['description'].'">';
                        $html .= '<input type="hidden" name="hidden-url-bbb-server-img" id="hidden-url-bbb-server-img-'. $meeting['avatars'][$i]['key'] .'" value="'.$meeting['avatars'][$i]['url-bbb-server'].'">';
                        $html .= '</div>';
                    }
                    echo $html;


                    ?>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-4">
        </div>
        <div class="col-12 col-md-8 pt-2">
            <div class="text-center buttons">
                <button onclick="previewPanelAvatars()" onmouseenter="hoverButtonAvatars('preview', event)" onmouseleave="unhoverButtonAvatars('preview', event)" class="pb-1 pt-1 font-weight-bold" id="btn-preview-panel-avatars">
                    <img src="/images/graphics/zurueck-button-avatars.png" alt="Zurück Button" class="btn-img">
                </button>
                <button onclick="nextPanelAvatars()" onmouseenter="hoverButtonAvatars('next', event)" onmouseleave="unhoverButtonAvatars('next', event)" class="pb-1 pt-1 font-weight-bold" id="btn-next-panel-avatars">
                    <img src="/images/graphics/weiter-button-avatars.png" alt="Weiter Button" class="btn-img">
                </button>
            </div>
        </div>
        <div id="modal-avatars" class="modal">
            <div class="row modal-content">
                <div class="row m-0">
                    <div class="col-12 col-lg-4">
                        <div class="graphic-6">
                            <img src="/images/graphics/eine-gute-wahl.png">
                        </div>
                        <div class="d-none d-sm-none d-md-none d-lg-block graphic-7">
                            <img src="/images/graphics/sprechblase.png">
                            <p class="description" id="description-avatar"></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <img src="" alt="" class="d-block" id="img-fullscreen-modal">
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-none d-sm-none d-md-none d-lg-block graphic-8">
                                    <a href="https://vimuki.org">
                                        <img src="/images/graphics/mehr-info.png">
                                    </a>
                                </div>
                                <div class="d-block d-sm-block d-md-block d-lg-none graphic-7-mobile-tablet">
                                    <img src="/images/graphics/sprechblase-oben.png">
                                    <p class="description" id="description-avatar-mobile-tablet"></p>
                                </div>
                                <div class="d-block d-sm-block d-md-block d-lg-none graphic-8">
                                    <a href="https://vimuki.org">
                                        <img src="/images/graphics/mehr-info.png">
                                    </a>
                                </div>
                                <div class="graphic-11">
                                    <form method="post" action="/room?meetingId=<?php echo $meeting['meeting_ref_id'];?>&eventId=<?php echo $meeting['event_ref_id']; ?>&page=3" id="form-select-avatar">
                                        <button type="submit" name="select-avatar" id="select-avatar" class="d-block btn-select-avatar">
                                            <img src="/images/graphics/weiter-button.png">
                                        </button>
                                        <input type="hidden" name="selected-avatar" value="<?php echo $meeting['random_avatar']; ?>" id="selected-avatar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-game" class="modal-game">
    <div class="modal-game-content">
        <div class="gm4html5_div_class" id="gm4html5_div_id">
            <!-- Create the canvas element the game draws to -->
            <canvas id="canvas" width="500" height="500" >
                <p>Your browser doesn't support HTML5 canvas.</p>
            </canvas>
        </div>
    </div>
</div>
<script>window.onload = GameMaker_Init;</script>

