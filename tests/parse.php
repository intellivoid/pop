<?php

    /** @noinspection PhpIncludeInspection */
    require("ppm");

    ppm\ppm::import("net.intellivoid.pop");

    $string = '-h 127.0.0.1 -u=user -p passwd --debug --max-size=3 test';
    print_r(pop\pop::parse($string));