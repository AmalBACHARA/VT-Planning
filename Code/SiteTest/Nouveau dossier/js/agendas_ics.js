/*
 * iCheck plugin
 */
$(document).on('icheck', function() {
    var callbacks_list = $('.demo-callbacks ul');
    $('.form-enseignant').on('click ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event) {
        callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
    }).iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue',
        increaseArea: '40%'
    });
}).trigger('icheck');
/*
 * ./iCheck plugin
 */

/*
 * DataTables plugin
 */
$(document).ready(function() {
    // EXAMPLE : http://editor.datatables.net/examples/api/checkbox.html
    $('table.table-enseignant').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "script/dataTablesGetProfs.php",
        "columns": [{
            "data": "id",
            "render": function(data, type, row) {
                if (type === 'display') {
                    return '<input id="box_' + row.codeProf + '" type="checkbox" name="' + row.codeProf + '">';
                }
                return data;
            },
            "defaultContent": "-"
        }, {
            "data": "nom",
            "render": function(data, type, row) {
                if (type === 'display') {
                    return row.nom + ' ' + row.prenom;
                }
                return data;
            },
            "defaultContent": "-"
        }, {
            "data": "prenom",
            "render": function(data, type, row) {
                if (type === 'display') {
                    return '<a id="lien_' + row.codeProf + '" class="btn btn-default" data-idprof="' + row.codeProf + '" data-nom="' + row.nom + '" data-prenom="' + row.prenom + '"><span class="glyphicon glyphicon-save"></span></a>';
                }
                return data;
            },
            "defaultContent": "-"
        }],
        "bSort": false,
        "bSortable": false,
        "lengthMenu": [200],
        "language": {
            "zeroRecords": "Aucun enseignant",
            "search": "Rechercher un enseignant _INPUT_"
        },
        "fnInitComplete": function(oSettings, json) {
            $(document).trigger('icheck');
        }
    });

    /* Download ENSEIGNANT-EdT one by one */

    $('table.table-enseignant a').on('click', function(event) {
        event.preventDefault();

        var idprof = $(this).data("idprof");
        var nom = $(this).data("nom");
        var prenom = $(this).data("prenom");

        var request = $.ajax({
                url: "icsprof/icsprof.php",
                type: "POST",
                data: {
                    idprof: idprof,
                    nom: nom,
                    prenom: prenom
                }
            })
            .done(function(data) {
                $("#lien_" + idprof)
                    .removeClass('btn-default')
                    .html('<span class="glyphicon glyphicon-ok"></span>')
                    .addClass('btn-success')
                    .attr('href', "<?php echo URL_RADICALE; ?>/Enseignants/" + nom.toLowerCase() + "_" + prenom.toLowerCase() + ".ics/");
                window.open($("#lien_" + idprof).attr('href'));
            })
            .fail(function(data) {
                $("#lien_" + idprof)
                    .removeClass('btn-default')
                    .html('<span class="glyphicon glyphicon-repeat"></span>')
                    .addClass('btn-danger');
                alert("La requête a échoué : " + textStatus);
            });
    });

});
/*
 * ./DataTables plugin
 */

/*
 * Manual scripts
 */
$(document).ready(function() {

    /*
     * Dropdown effect on Enseignant-list
     */
    $('.table-enseignant th').click(function(e) {
        $('#DataTables_Table_0 tbody, .downloadEnseigant').slideToggle("fast");

        /* recoder proprement */
        var monIcone = $('#plusEnseignant');
        var change = monIcone.hasClass('glyphicon-chevron-down');
        if (change) {
            monIcone.removeClass('glyphicon-chevron-down')
                .addClass('glyphicon-chevron-up');
            $('.button-enseignant').hide('fast');
            $('#DataTables_Table_0_filter').slideUp();
        } else {
            monIcone.removeClass('glyphicon-chevron-up')
                .addClass('glyphicon-chevron-down');
            $('.button-enseignant').show('fast');
            $('#DataTables_Table_0_filter').slideDown();
        }

    });

    /*
     * Dropdown effect on Groupe-list (filière)
     */
    $('.table-groupe th').click(function(e) {
        $('#DataTables_Table_1 tbody, .downloadGroupe').slideToggle("fast");

        /* recoder proprement */
        var monIcone = $('#plusGroupe');
        var change = monIcone.hasClass('glyphicon-chevron-down');
        if (change) {
            monIcone.removeClass('glyphicon-chevron-down')
                .addClass('glyphicon-chevron-up');
            $('.button-groupe').hide('fast');
            $('#DataTables_Table_1_filter').slideUp();

        } else {
            monIcone.removeClass('glyphicon-chevron-up')
                .addClass('glyphicon-chevron-down');
            $('.button-groupe').show('fast');
            $('#DataTables_Table_1_filter').slideDown();
        }
    });

    /*
     * Button - choose a category (Enseignant, Filière, Salle)
     */
    $('#form-enseignant').click(function() {
        $('.form-groupe, .form-salle').hide('fast');
        $('.form-enseignant').show('fast');
        $('#form-groupe, #form-salle').removeClass('active');
        $(this).addClass('active');
    });
    $('#form-groupe').click(function() {
        $('.form-enseignant, .form-salle').hide('fast');
        $('.form-groupe').show('fast');

        $('#form-salle, #form-enseignant').removeClass('active');
        $(this).addClass('active');
    });
    $('#form-salle').click(function() {
        $('.form-enseignant, .form-groupe').hide('fast');
        $('.form-salle').show('fast');
        $('#form-enseignant, #form-groupe').removeClass('active');
        $(this).addClass('active');
    });

    /* par défault, on affiche uniquement le form-enseignant */
    $('.form-groupe, .form-salle').hide('fast');
});
/*
 * Manual scripts
 */
