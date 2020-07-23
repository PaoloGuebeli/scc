
<div class="main-container">
    <div class="list-container">
        <h2 class="subtitle" onclick="toggleList()">Lista Utenti<i class="fa fa-arrow-down"></i></h2>
        <table class="list hidden">
            <tr>
                <th>Nome</th>
                <th>Data di nascita</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Grado</th>
            </tr>
            <tr>
                <td>
                    Paolo Gübeli
                </td>
                <td>
                    24.10.2001
                </td>
                <td>
                    guebeli.paolo@gmail.com
                </td>
                <td>
                    078 638 10 54
                </td>
                <td>
                    Aiuto Monitore
                </td>
            </tr>
        </table>

    </div>
    <div class="add-container">
        <h2 class="subtitle" onclick="toggleNew()">Aggiungi Utente<i class="fa fa-arrow-down"></i></h2>
        <div class="add-form hidden" >
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
        <h2 class="subtitle" onclick="toggleUpdate()">Modifica Utente<i class="fa fa-arrow-down"></i></h2>
        <div class="update-form hidden" >
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
            <button>Modifica</button>
        </div>
    </div>
    <div class="delete-container">
        <h2 class="subtitle" onclick="toggleDelete()">Elimina Utente<i class="fa fa-arrow-down"></i></h2>
        <form class="delete-form">

        </form>
    </div>
</div>
</body>
<script>

</script>
</html>
