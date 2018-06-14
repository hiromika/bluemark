<li id="" class="green">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="icon-envelope icon-animated-vertical"></i>
    </a>

    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
        <li class="nav-header">
            <i class="icon-envelope-alt"></i>
            4 Latest Messages
        </li>

        <?php foreach ($data as $item) { ?>
            <li><a href="/broadcast/">
                <span class="msg-body" style="max-width: 100%">
                    <span class="msg-time">
                        <i class="icon-time"></i>
                        <span><?php echo $item['BCAST_DATE']; ?></span>
                    </span>

                    <span class="msg-title">
                        <?php echo substr($item['BCAST_SUBJECT'], 0, 45); ?> ...
                    </span>
                </span>
            </a></li>
        <?php } ?>

        <li>
            <a href="/broadcast/">
                See all messages
                <i class="icon-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>