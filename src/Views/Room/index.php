<div class="container-fluid main-room-page-1">
    <div class="row">
        <div class="col-12">
            <div class="float-right countdown">
                <img src="/images/graphics/graphic_4.png">
                <span class="text-center" id="countdown"></span>
            </div>
            <input type="hidden" name="hidden-event-time" value="<?php echo $meeting['time'] ?>" id="hidden-event-time">
            <input type="hidden" name="hidden-event-date" value="<?php echo $meeting['date'] ?>" id="hidden-event-date">
        </div>
        <div class="col-12 pt-2">
            <p class="font-weight-bold text-right"><?php if(isset($meeting['error'])){echo $meeting['error'];}?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 pt-4">
            <div class="graphic-5">
                <img src="/images/graphics/welcome.png">
            </div>
        </div>
        <div class="col-12 col-sm-8 pt-4">
            <div class="graphic-6">
                <img src="/images/graphics/bienvenue.png">
            </div>
            <div class="graphic-7">
                <img src="/images/graphics/bienvenidos.png">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-0 d-block d-sm-none">
            <div class="float-right graphic-2-mobile-table">
                <img src="/images/graphics/sprechblase-willkommen.png">
            </div>
        </div>
        <div class="col-12 col-sm-4 pr-4">
            <div class="graphic-1">
                <img src="/images/graphics/vimukel.png">
            </div>
        </div>
        <div class="col-12 col-sm-7 col-md-8">
            <div class="row p-0 d-none d-sm-block">
                <div class="col-12 p-0">
                    <div class="graphic-2">
                        <img src="/images/graphics/sprechblase-willkommen.png">
                    </div>
                </div>
            </div>
            <div class="row p-0">
                <div class="col-12 col-md-10 pt-4">
                    <div class="graphic-3 d-inline-block">
                        <img src="/images/graphics/lass-uns-ein-spiel-spielen.png">
                    </div>
                    <div class="d-inline-block container-countdown-start">
                        <div class="p-0 countdown-start">
                            <a onmouseenter="hoverGoButton('hover')" onmouseleave="hoverGoButton('unhover')" href="/room?meetingId=<?php echo $meeting['meeting_ref_id'];?>&eventId=<?php echo $meeting['event_ref_id']; ?>&page=2" class="d-block btn-countdown-start">
                                <img src="/images/graphics/btn-go-pink.png" id="start-button-img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

