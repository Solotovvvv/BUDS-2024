<?php
    require '../../vendor/autoload.php'; // Include Pusher PHP library

    $pusher = new Pusher\Pusher(
        '5b1eb2892347a33d5be9',
        '0dbf6b6d40bb6a4ee500',
        '1766635',
        [
            'cluster' => 'ap1',
            'useTLS' => true
        ]
    );
?>

