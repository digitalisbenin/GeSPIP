<div class="row g-3 ">
    <legend>Informations conernant l'etat de l'activité</legend>
    <div class="border border-3 border-primary h-100">

    <div class="col text-lg ">
        <label for="name">Démarrage:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="non" name="demarre"
                id="nonRadio" checked>
            <label class="form-check-label" for="nonRadio">
                Non
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="demarre" id="ouiRadio"
                value="oui">
            <label class="form-check-label" for="ouiRadio">
                Oui
            </label>
        </div>
        {{--  <input type="text" class="form-control form-control-lg" placeholder="" name="demarre"
            id="demarre" aria-label="Last name">  --}}
    </div>
    <div class="col text-lg">
        <label for="name">Date de remise de site:</label>
        <input type="date" class="form-control form-control-lg" placeholder=""
            name="date_de_remise_site" id="date_de_remise_site" disabled>
    </div>

</div>


<div >
    <div class="row g-3 ">

        <div class="col text-lg">
            <label for="name">Date de démarrage:</label>
            <input type="date" class="form-control form-control-lg" placeholder=""
                name="date_de_demarrage" id="date_de_demarrage" disabled>
        </div>

        <div class="col text-lg">
            <label for="name">Date problable achèvrement du projet:</label>
            <input type="text" readonly class="form-control form-control-lg" placeholder=""
                name="date_achev_pro" id="date_achev_pro" aria-label="">
        </div>

    </div>
    </div>
</div>


