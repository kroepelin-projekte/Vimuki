<div class="container-fluid main-room-page-3">
    <div class="row">
        <div class="col-12">
            <div class="float-right countdown">
                <img src="/images/graphics/graphic_4.png">
                <span class="text-center" id="countdown"></span>
            </div>
            <input type="hidden" name="hidden-event-time" value="<?php echo $meeting['time'] ?>" id="hidden-event-time">
            <input type="hidden" name="hidden-event-date" value="<?php echo $meeting['date'] ?>" id="hidden-event-date">
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-12 col-md-4 p-0">
            <div class="graphic-1">
                <img src="/images/graphics/fast-geschafft.png">
            </div>
            <div class="graphic-2">
                <img src="/images/graphics/vimukel-gross.png">
            </div>
        </div>
        <div class="col-12 col-md-8">
            <form method="post" action="/room?meetingId=<?php echo $meeting['meeting_ref_id'];?>&eventId=<?php echo $meeting['event_ref_id']; ?>&page=4" onsubmit="validation()">
                <div class="container-input-and-btn-start">
                    <div class="graphic-10 pt-4">
                        <img src="/images/graphics/jetzt-namen-eingeben.png">
                    </div>
                    <div class="graphic-11 pt-4">
                        <img src="/images/graphics/eingabefeld.png">
                        <input type="text" name="name" id="username">
                    </div>
                    <div class="container-error">
                        <p class="font-weight-bold validation-error" id="validation-error"></p>
                    </div>
                    <div class="graphic-12">
                        <input type="submit" onmouseenter="hoverStartButton('hover')" onmouseleave="hoverStartButton('unhover')" name="join" class="btn-join-meeting" id="join-button-img">
                    </div>
                    <input type="hidden" name="hidden-selected-avatar" value="<?php echo $meeting['selected-avatar'];?>">
                </div>
            </form>
            <div class="col-12">

            </div>
        </div>
    </div>
</div>
