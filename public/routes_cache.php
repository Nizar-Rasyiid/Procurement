<?php

$commandOutput = [];
exec('php artisan route:cache', $commandOutput, $returnValue);

if ($returnValue === 0) {
    echo "Route cache updated successfully.";
} else {
    echo "Failed to update route cache.";
}