<?php

require_once '../../init.php';

User::authorize('advisor');

echo HTML::template('advisor/index.php');
