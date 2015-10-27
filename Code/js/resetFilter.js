function reset(code) {
        console.log(code);
        $('#groupesFilter').val('all');
        $('#profsComposantesFilter').val('all');
        $('#departementFilter').val('all');
        loadGroupesListFilter();
        loadProfsListFilter(code);
        loadSallesListFilter();
        $('#profsFilter').val(code);
		updateCalendar();
}