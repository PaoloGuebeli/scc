
<div class="main-container">
    <div class="list-container">
        <h2 class="subtitle" onclick="toggleList()">Lista Eventi<i class="fa fa-arrow-down"></i></h2>
        <table class="list hidden">
            <tr>
                <th>Nome</th>
                <th>Data inizio/fine</th>
                <th>Descrizione</th>
                <th>Grado</th>
            </tr>
            <tr>
                <td>
                    Uscita
                </td>
                <td>
                    24.10.2020
                </td>
                <td>
                    Riunione monitori
                </td>
                <td>
                    Monitori
                </td>
            </tr>
        </table>

    </div>
    <div class="add-container">
        <h2 class="subtitle" onclick="toggleNew()">Aggiungi Evento<i class="fa fa-arrow-down"></i></h2>
        <div class="add-form hidden" >
            <input type="text" placeholder="Nome">
            <input type="date" placeholder="Data inizio">
            <input type="date" placeholder="Data fine">
            <select id="level">
                <option value="0">
                    Pubblico
                </option>
                <option value="1">
                    Monitori
                </option>
            </select>
            <textarea cols="50" rows="5" placeholder="Descrizione"></textarea>
            <br>
            <button>Aggiungi</button>
        </div>
    </div>
    <div class="update-container">
        <h2 class="subtitle" onclick="toggleUpdate()">Modifica Evento<i class="fa fa-arrow-down"></i></h2>
        <div class="update-form hidden" >
            <input type="text" placeholder="Nome">
            <input type="date" placeholder="Data inizio">
            <input type="date" placeholder="Data fine">
            <select id="level">
                <option value="0">
                    Pubblico
                </option>
                <option value="1">
                    Monitori
                </option>
            </select>
            <textarea cols="50" rows="5" placeholder="Descrizione"></textarea>
            <br>
            <button>Modifica</button>
        </div>
    </div>
    <div class="delete-container">
        <h2 class="subtitle" onclick="toggleDelete()">Elimina Evento<i class="fa fa-arrow-down"></i></h2>
        <form class="delete-form">

        </form>
    </div>
</div>
</body>
<script>

</script>
</html>
