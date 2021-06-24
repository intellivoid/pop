<?php

    /** @noinspection PhpIncludeInspection */
    require("ppm");

    ppm\ppm::import("net.intellivoid.pop");

    $string = '-f -h 127.0.0.1 -u=user -p passwd -t = "some \"test\"" --debug -f --max-size=3 --another-test="this is a \"quoted\" str" --long-arg = \'single \\\'quotes\\\'\' test data after everything else!';
    print_r(pop\pop::parse($string));