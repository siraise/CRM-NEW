<?php 

echo '<style>
.date-range-form {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.date-inputs {
    display: flex;
    gap: 5px;
}

.date-input {
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 12px;
}

.date-submit-btn {
    padding: 5px 10px;
    background-color: #428bca;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.date-submit-btn:hover {
    background-color: #357abd;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.date-submit-btn:active {
    transform: translateY(0);
    box-shadow: none;
}
</style>';

function OutputClients($clients) {
    foreach ($clients as $key => $client) {
        $id = $client['id'];
        $name = $client['name'];
        $email = $client['email'];
        $phone = $client['phone'];
        $birthday = $client['birthday'];
        $created_at = $client['created_at'];

        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>$phone</td>
                <td>$birthday</td>
                <td>$created_at</td>
                <td>
                    <form class='date-range-form' action='api/clients/ClientHistory.php' method='GET'>
                        <div class='date-inputs'>
                            <input value='$id' name='id' hidden>
                            <input type='date' id='from' name='from' class='date-input'>
                            <input type='date' id='to' name='to' class='date-input'>
                        </div>
                        <button type='submit' class='date-submit-btn'>Сформировать</button>
                    </form>
                </td>
                <td onclick=\"MicroModal.show('edit-modal')\"><i class='fa fa-pencil'></i></td>
                <td><a href='api/clients/ClientsDelete.php?id=$id'><i class='fa fa-trash'></i></a></td>
            </tr>";
    }
}

?>