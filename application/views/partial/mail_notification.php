<div id="mail-notification">
    <?php foreach ($notifications as $notification):
        if ($notification->read == 0):
            ?>
            <li>
                <div class="dropdown-messages-box ">
                    <div class="media-body">
                        <strong><?= $notification->first_name . " " . $notification->last_name ?></strong>
                        <br/>
                        <span><?= substr($notification->subject, 0, 30); ?></span>
                        <small class="pull-right text-muted"><?= $notification->timestamp ?></small>
                    </div>
                </div>
            </li>
            <li class="divider"></li>
        <?php
        endif;
    endforeach;
    ?>
    <li>
        <div class="text-center link-block">
            <a href="/index.php/inbox">
                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
            </a>
        </div>
    </li>
</div>