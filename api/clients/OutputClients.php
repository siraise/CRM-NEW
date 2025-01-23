<?php

function OutputClients($clients){
    foreach($clients as $client){
        $id = $client['id'];
        $clients_name = $client['name'];
        $email = $client['email'];
        $phone = $client['phone'];
        $birthday = $client['birthday'];
        $created_at = $client['created_at'];
        
        echo "<tr>
        <td>$id</td>
        <td>$clients_name</td>
        <td>$email</td>
        <td>$phone</td>
        <td>$birthday</td>
        <td>$created_at</td>
        <td onclick='MicroModal.show(\"history-modal\")'><i class='fa fa-book' aria-hidden='true'></i></td>
        <td onclick='MicroModal.show(\"edit-modal\")'><i class='fa fa-pencil' aria-hidden='true'></i></td>
        <td onclick='MicroModal.show(\"delete-modal\")'><i class='fa fa-trash' aria-hidden='true'></i></td>
    </tr>";
}}

?>