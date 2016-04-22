<?php
foreach ($clients as &$client) {
    unset($client->generated_html);
}
echo json_encode(compact('clients'));
