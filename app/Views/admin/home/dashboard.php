<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="dashboard">
    <section>
        <header>
            <h3><b>Welcome back, Admin!</b></h3>
            <p class="disable"><?= $tanggal = date("j F Y, l"); ?></p>
        </header>
        <div class="row">
            <div class="col-lg">
                <!-- <div class="card todo-list"> -->
                    <form action="admin/saveTodo" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <!-- <input type="text" class="form-control" placeholder="Add your todo here" name="txtTitle"> -->
                        <div class="row">
                            <div class="col-lg">
                                <input type="text" class="form-control" placeholder="Add your todo here" name="txtTitle">
                            </div>
                            <div class="col-lg">
                                <input type="date" class="form-control" name="txtDeadline">
                            </div>
                        </div>
                    </form>
                    <?php if ($todo != null) { ?>
                        <?php foreach ($todo as $td) : ?>
                            <div class="card-list">
                                <div class="main">
                                    <p><?= $td['title_todo']; ?></p>
                                    <p class="disable"><?= $td['deadline_todo']; ?></p>
                                </div>
                                <form class="formremove" action="/admin/removeTodo/<?= $td['id_todo']; ?>" method="post">
                                    <button type="submit" class="remove">
                                        <img src="<?= base_url(); ?>/imgassets/remove.png" alt="">
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div class="notodo1"></div>
                    <?php } ?>
                <!-- </div> -->
            </div>
            <div class="col-4">
                <!-- <div class="card"> -->
                <div id="calendar">
                    <div id="calendar_header">
                        <i class="icon-chevron-left"></i>
                        <h1></h1>
                        <i class="icon-chevron-right"></i>
                    </div>
                    <div id="calendar_weekdays"></div>
                    <div id="calendar_content"></div>
                </div>
                <div class="deadline" style="margin-top: 60vh;">
                    <p><b>Your Schedule</b></p>
                    <?php if ($todo != null) { ?>
                        <?php foreach ($todo as $td) : ?>
                            <div class="card-list">
                                <div class="main">
                                    <p><?= $td['title_todo']; ?></p>
                                    <p class="disable"><?= $td['deadline_todo']; ?></p>
                                </div>
                                <?php
                                $now = time();
                                $your_date = strtotime($td['deadline_todo']);
                                $datediff = $your_date - $now;
                                // dd($datediff);
                                $days_left = ceil($datediff / (60 * 60 * 24));
                                if ($days_left == 0) {
                                ?>
                                    <div class="deadline">
                                        <form class="formcheck" action="/admin/removeTodo/<?= $td['id_todo']; ?>" method="post">
                                            <button class="check" type="submit">
                                                <p class="green">Today</p>
                                            </button>
                                        </form>
                                    </div>
                                <?php } else { ?>
                                    <div class="deadline">
                                        <p class="disable"><?= $days_left ?> Days Left</p>
                                        <form class="formcheck" action="/admin/removeTodo/<?= $td['id_todo']; ?>" method="post">
                                            <button class="check" type="submit">
                                                <img src="<?= base_url(); ?>/imgassets/check.png" alt="">
                                            </button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div class="notodo2">
                            <p><small>No to do now, take a rest</small></p>
                        </div>
                    <?php } ?>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(function() {
        function c() {
            p();
            var e = h();
            var r = 0;
            var u = false;
            l.empty();
            while (!u) {
                if (s[r] == e[0].weekday) {
                    u = true;
                } else {
                    l.append('<div class="blank"></div>');
                    r++;
                }
            }
            for (var c = 0; c < 42 - r; c++) {
                if (c >= e.length) {
                    l.append('<div class="blank"></div>');
                } else {
                    var v = e[c].day;
                    var m = g(new Date(t, n - 1, v)) ? '<div class="today">' : "<div>";
                    l.append(m + "" + v + "</div>");
                }
            }
            var y = o[n - 1];
            a.css("background-color", y)
                .find("h1")
                .text(i[n - 1] + " " + t);
            f.find("div").css("color", y);
            l.find(".today").css("background-color", y);
            d();
        }

        function h() {
            var e = [];
            for (var r = 1; r < v(t, n) + 1; r++) {
                e.push({
                    day: r,
                    weekday: s[m(t, n, r)]
                });
            }
            return e;
        }

        function p() {
            f.empty();
            for (var e = 0; e < 7; e++) {
                f.append("<div>" + s[e].substring(0, 3) + "</div>");
            }
        }

        function d() {
            var t;
            var n = $("#calendar").css("width", e + "px");
            n.find((t = "#calendar_weekdays, #calendar_content"))
                .css("width", e + "px")
                .find("div")
                .css({
                    width: e / 7 + "px",
                    height: e / 7 + "px",
                    "line-height": e / 7 + "px",
                });
            n.find("#calendar_header")
                .css({
                    height: e * (1 / 7) + "px"
                })
                .find('i[class^="icon-chevron"]')
                .css("line-height", e * (1 / 7) + "px");
        }

        function v(e, t) {
            return new Date(e, t, 0).getDate();
        }

        function m(e, t, n) {
            return new Date(e, t - 1, n).getDay();
        }

        function g(e) {
            return y(new Date()) == y(e);
        }

        function y(e) {
            return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate();
        }

        function b() {
            var e = new Date();
            t = e.getFullYear();
            n = e.getMonth() + 1;
        }
        var e = 320;
        var t = 2013;
        var n = 9;
        var r = [];
        var i = [
            "January,",
            "February,",
            "March,",
            "April,",
            "May,",
            "June,",
            "July,",
            "August,",
            "September,",
            "October,",
            "November,",
            "December,",
        ];
        var s = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];
        var o = [
            // "#16a085",
            // "#1abc9c",
            // "#c0392b",
            // "#27ae60",
            // "#FF6860",
            // "#f39c12",
            // "#f1c40f",
            // "#e67e22",
            // "#2ecc71",
            // "#e74c3c",
            // "#d35400",
            // "#2c3e50",
        ];
        var u = $("#calendar");
        var a = u.find("#calendar_header");
        var f = u.find("#calendar_weekdays");
        var l = u.find("#calendar_content");
        b();
        c();
        a.find('i[class^="icon-chevron"]').on("click", function() {
            var e = $(this);
            var r = function(e) {
                n = e == "next" ? n + 1 : n - 1;
                if (n < 1) {
                    n = 12;
                    t--;
                } else if (n > 12) {
                    n = 1;
                    t++;
                }
                c();
            };
            if (e.attr("class").indexOf("left") != -1) {
                r("previous");
            } else {
                r("next");
            }
        });
    });
</script>
<?= $this->endSection(); ?>