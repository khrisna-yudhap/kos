    <div id="sidebar" class="sidebar">
      <!-- begin sidebar scrollbar -->
      <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
          <li class="nav-profile">
            <a href="javascript:;" data-toggle="nav-profile">
              <div class="cover with-shadow"></div>
              <div class="image image-icon bg-black text-grey-darker">
                <i class="fa fa-user"></i>
              </div>
              <div class="info">
                <b class="caret pull-right"></b>
                Sean Ngu
                <small>Front end developer</small>
              </div>
            </a>
          </li>
          <li>
            <ul class="nav nav-profile">
              <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
              <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
              <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
            </ul>
          </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
          <li class="nav-header">Navigation</li>
          <!-- <li class="active">
            <a href="index.html">
              <i class="fa fa-th-large"></i>
              <span>Home</span>
            </a>
          </li> -->
          <?php
          foreach ($menu as $main) {
            if ($main['MenuParentId'] == '0') { ?>

              <li class="<?= $main['MenuModule'] == '#' ? 'has-sub' : ''; ?> <?= $url == $main['MenuParent'] ? 'active' : ''; ?>">
                <a href="<?= $main['MenuModule'] != '#' ? site_url() . '/'  . $main['MenuModule'] : '#'; ?>">
                  <?= $main['MenuModule'] == '#' ? '<b class="caret"></b>' : ''; ?>
                  <i class="<?= $main['MenuIcon'] != '' ? $main['MenuIcon'] : ''; ?>"></i>
                  <span><?= $main['MenuName'] ?></span>
                </a>
                <ul class="sub-menu">

                  <?php
                  foreach ($menu as $submenu1) {
                    if ($submenu1['MenuParentId'] == $main['MenuId']) { ?>

                      <li class="<?= $submenu1['MenuModule'] == '#' ? 'has-sub' : ''; ?> <?= $url == $main['MenuParent'] ? 'active' : ''; ?>">
                        <a href="<?= site_url() . '/'  . $submenu1['MenuModule'] ?>">
                          <?= $submenu1['MenuName'] ?>
                          <?= $submenu1['MenuModule'] == '#' ? '<b class="caret"></b>' : ''; ?>
                        </a>
                        <ul class="sub-menu">
                          <?php
                          foreach ($menu as $submenu2) {
                            if ($submenu2['MenuParentId'] == $submenu1['MenuId']) { ?>

                              <li class="has-sub">
                                <a href="<?= site_url() . '/'  . $submenu2['MenuModule'] ?>">
                                  <?= $submenu2['MenuName'] ?>

                                  <?= $submenu2['MenuModule'] == '#' ? '<b class="caret"></b>' : ''; ?>
                                </a>
                                <ul class="sub-menu <?= $url == $main['MenuParent'] ? 'active' : ''; ?>">
                                  <?php
                                  foreach ($menu as $submenu3) {
                                    if ($submenu3['MenuParentId'] == $submenu2['MenuId']) { ?>

                                      <li class="has-sub">
                                        <a href="<?= site_url() . '/'  . $submenu3['MenuModule'] ?>">
                                          <?= $submenu3['MenuName'] ?>
                                          <?= $submenu3['MenuModule'] == '#' ? '<b class="caret"></b>' : ''; ?>
                                        </a>
                                        <ul class="sub-menu <?= $url == $main['MenuParent'] ? 'active' : ''; ?>">
                                          <?php
                                          foreach ($menu as $submenu4) {
                                            if ($submenu4['MenuParentId'] == $submenu3['MenuId']) { ?>

                                              <li class="<?= $url == $main['MenuParent'] ? 'active' : ''; ?>">
                                                <a href="<?= site_url() . '/'  . $submenu4['MenuModule'] ?>">
                                                  <?= $submenu4['MenuName'] ?>
                                                  <?= $submenu4['MenuModule'] == '#' ? '<b class="caret"></b>' : ''; ?>
                                                </a>
                                              </li>

                                            <?php } ?>
                                          <?php } ?>
                                        </ul>
                                      </li>

                                    <?php } ?>
                                  <?php } ?>
                                </ul>
                              </li>

                            <?php } ?>
                          <?php } ?>
                        </ul>
                      </li>
                    <?php } ?>
                  <?php } ?>
                </ul>
              </li>
            <?php } ?>
          <?php } ?>
          <!-- begin sidebar minify button -->
          <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
          <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <!-- end #sidebar -->
    <div class="sidebar-bg"></div>