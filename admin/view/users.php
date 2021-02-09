<div class="main-container">
    <div class="list-container">
        <h2 class="subtitle" onclick="toggleList()">Lista Utenti<i class="fa fa-arrow-down"></i></h2>
        <table class="list hidden" id="list">

        </table>

    </div>
    <div class="add-container">
        <h2 class="subtitle" onclick="toggleNew()">Aggiungi Utente<i class="fa fa-arrow-down"></i></h2>
        <div class="add-form hidden">
            <input type="text" placeholder="Nome">
            <input type="text" placeholder="Cognome">
            <input type="email" placeholder="E-mail">
            <input type="text" placeholder="Telefono">
            <input type="date" placeholder="Data di nascita">
            <select id="level">
                <option value="0">
                    Partecipante
                </option>
                <option value="1">
                    Aspirante Monitore
                </option>
                <option value="2">
                    Aiuto Monitore
                </option>
                <option value="3">
                    Monitore
                </option>
                <option value="4">
                    Amministratore
                </option>
            </select>
            <button>Aggiungi</button>
        </div>
    </div>
    <div class="update-container">
        <h2 class="subtitle">Modifica Utente</h2>
        <div class="update-form hidden">
            <input type="text" placeholder="Nome" id="uName">
            <input type="text" placeholder="Cognome" id="uSurname">
            <input type="text" placeholder="Telefono" id="uPhone">
            <input type="number" placeholder="Anno di nascita" id="uBY">
            <select id="uLevel">
                <option value="3">
                    Partecipante
                </option>
                <option value="2">
                    Aspirante Monitore
                </option>
                <option value="2">
                    Aiuto Monitore
                </option>
                <option value="1">
                    Monitore
                </option>
                <option value="0">
                    Amministratore
                </option>
            </select>
            <br>
            <button id="editButton">Modifica</button>
            <button class="delete" onclick="deleteUser()">Elimina Utente</button>
        </div>
    </div>
</div>
</body>
<script>

    var users;
    var lastId;

    function getData() {
        getUsers();
    }

    function getUsers() {

        var request = $.ajax({
            url: "<?php echo URL ?>Users/getUsers",
            type: "post"
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            if (response !== "null") {
                users = JSON.parse(response);
                $('#list').empty();
                $('#list').append('<thead><tr>\n' +
                    '                <th>Nome</th>\n' +
                    '                <th>Anno di nascita</th>\n' +
                    '                <th>Email</th>\n' +
                    '                <th>Telefono</th>\n' +
                    '                <th>Grado</th>\n' +
                    '            </tr></thead>')
                $.each(users, function (index, line) {
                    var level = '';
                    if (line['Level'] === 0) {
                        level = "Admin";
                    } else if (line['Level'] === 1) {
                        level = "Monitore";
                    } else if (line['Level'] === 2) {
                        level = "Aiuto/Aspi";
                    } else {
                        level = "Partecipante";
                    }
                    $('#list').append('<tr class="row" onclick="setUpdate(' + index + ')" id="tr' + index + '">' +
                        '<td>' + line['Name'] + ' ' + line['Surname'] + '</td>' +
                        '<td>' + line['Birthyear'] + '</td>' +
                        '<td>' + line['Email'] + '</td>' +
                        '<td>' + line['Phone'] + '</td>' +
                        '<td>' + level + '</td>' +
                        '<tr>');
                    console.log(line);
                });
            }
        });
    }

    function updateUser(id) {

        var name = $('#uName').val();
        var surname = $('#uSurname').val();
        var birthyear = $('#uBY').val();
        var level = $('#uLevel').val();
        var phone = $('#uPhone').val();

        var request = $.ajax({
            url: "<?php echo URL ?>Users/updateUser",
            type: "post",
            data: {"id":id, "name": name, "surname": surname, "birthyear": birthyear, "phone":phone, "level":level}
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            if (response !== "null") {
                var message = JSON.parse(response);
                if(message[0]) {
                    alert("Utente modificato con successo!")
                    getUsers();
                }else{
                    console.log(message);
                    alert("C'è stato un'errore con l'aggiornamento.")
                }
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    }


    function setUpdate(line) {
        if (users[line]["Id"] === lastId) {
            toggleUpdate();
            lastId = null;
        }
        if (lastId == null){
            toggleUpdate();
        }

        $('#editButton').attr('onclick','updateUser('+users[line]["Id"]+')')
        $('#uName').val(users[line]["Name"]);
        $('#uSurname').val(users[line]["Surname"]);
        $('#uBY').val(users[line]["Birthyear"]);
        $('#uPhone').val(users[line]["Phone"]);
        $('#uLevel').val(users[line]["Level"]);
    }
    
</script>
</html>
